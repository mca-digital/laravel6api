<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contact;

class ContactController extends Controller
{
    public function index(){
    	$contacts = Contact::all();
    	return response()->json($contacts);
    }

    public function store(Request $request){
    	$postData = $request->all();

    	$validator = Validator::make($request->all(),[
    		'name'=>'required|min:6|max:255',
    		'email'=>'required|email|unique:contacts'
    	]);

    	if($validator->fails()){
    		$errors = $validator->errors();
    		return response()->json(['errors'=>$errors],400);	
    	}

    	$contact = Contact::create($postData);
    	return response()->json($contact);
    }

    public function show(Contact $contact){
    	return response()->json($contact);	
    }

    public function update(Request $request, Contact $contact){
    	$postData = $request->all();

    	$validator = Validator::make($request->all(),[
    		'name'=>'required|min:6|max:255',
    		'email'=>'required|email|unique:contacts,'.$contact->id
    	]);

    	if($validator->fails()){
    		$errors = $validator->errors();
    		return response()->json(['errors'=>$errors],400);	
    	}

    	$contact->update($request->all());
    	return response()->json($contact);
    }

    public function destroy(Contact $contact){
    	$deleted = $contact->delete();
    	return response()->json('Contato Deletado com Sucesso!',200);
    }
}
