<?php namespace Codesleeve\Platform\Controllers;

use View, Input, Auth, Session, Redirect, Response, App, Validator;

class PhotosController extends BaseController {    

	/**
	 * index method
	 * 
	 * @return Laravel\View 
	 */
	public function index()
    {
    	$photos = App::make('Photo')->all();

    	return View::make('photos.index', compact('photos'));
    }    

    /**
     * store method
     * 
     * @return Laravel\Response
     */
	public function store()
    {
        $photo = App::make('photo');
        $photo->photo = Input::file('upload');

        if ($photo->save()) 
        {
            //Send back the URL of an uploaded file to ckeditor
            $funcNum = Input::query('CKEditorFuncNum');
            $url = $photo->photo->url();
            $message = 'Upload successful!';

            return Response::make("<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url');</script>", 201);
        } 
        else 
        {
            $funcNum = Input::query('CKEditorFuncNum');
            $message = 'Upload failed, please try again.';
            
            return Response::make("<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '', '$message');</script>", 422); 
        }
    }

}