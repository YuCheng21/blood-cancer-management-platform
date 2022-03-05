<?php

namespace App\Http\Controllers;

use App\Models\CategoryInformation;
use App\Models\Faq;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::orderBy('updated_at', 'desc')->get();

        $categories = CategoryInformation::orderBy('category_1', 'asc')->get();

        $title = 'QA 管理';
        return response(
            view('root.faq', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    public function store(Request $request)
    {
        $rules = [
            'createFaqType' => ['required'],
            'createFaqTitle' => ['required'],
            'createFaqContent' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成'
                ]);
        }
        $data = [
            'category_1' => $request->createFaqType,
            'title' => $request->createFaqTitle,
            'content' => $request->createFaqContent,
        ];
        try {
            Faq::create($data);
            return back()
                ->with([
                    'type' => 'success-toast',
                    'msg' => '新增 QA 成功。'
                ]);
        } catch (QueryException $queryException) {
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => 'SQLState: ' . $queryException->errorInfo[0]
                ]);
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'updateFaqType' => ['required'],
            'updateFaqTitle' => ['required'],
            'updateFaqContent' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成'
                ]);
        }
        $data = [
            'category_1' => $request->updateFaqType,
            'title' => $request->updateFaqTitle,
            'content' => $request->updateFaqContent,
        ];
        $faq = Faq::where([
            'id' => $id,
        ])->first();
        try {
            $faq->update($data);
            return back()
                ->with([
                    'type' => 'success-toast',
                    'msg' => '新增 QA 成功。'
                ]);
        } catch (QueryException $queryException) {
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => 'SQLState: ' . $queryException->errorInfo[0]
                ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        $faq = Faq::where([
            'id' => $id,
        ])->first();
        if (!is_null($faq)) {
            $faq->delete();
        }
        return back()
            ->with([
                'type' => 'success-toast',
                'msg' => '刪除 QA 成功。'
            ]);
    }
}
