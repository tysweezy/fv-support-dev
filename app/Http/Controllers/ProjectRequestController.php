<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailRequester;
use App\Mail\SurveyRequestMail;
use App\Mail\RequestWithoutAttachment;
use Illuminate\Support\Facades\Mail;
use App\Project;
use App\Http\Requests;

class ProjectRequestController extends Controller
{
    /**
     * Show all survey request...current and closed.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return all requests for now. 
       $requests = Project::all();

       return view('project.request.all')->with('requests', $requests);
    }

    /**
     * Show the form for creating a new survey reqest form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.request.create');
    }

    /**
     * validation
     * Process form..send out email confirmation. 
     * After, email confirmation and validation. 
     * Store in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'project_title'       => 'required',
            'project_location'    => 'url',
            'requester_email'     => 'required|email',
            'project_description' => 'required',
            'project_type'        => 'required',
            'attachment'          => 'mimes:zip,jpg,png,pdf'
        ]);

        
       // repeating self..will need to refactor.
       if ( $request->hasFile('attachment') ) {
         $attachment_name = 'project-request-' . time() . '.' . $request->file('attachment')->getClientOriginalExtension();  
         $request->file('attachment')->move(
           base_path() . '/public/uploads/survey_requests', $attachment_name
         );            

         $file = base_path() . '/public/uploads/survey_requests/'. $attachment_name;
       } else {
           $file = '';
       }
       
 
        // store request in DB
         // attatchment may need filepath?
        $survey = Project::create([
            'project_title'       => $request->input('project_title'),
            'project_location'    => $request->input('project_location'),
            'project_description' => $request->input('project_description'),
            'project_type'        => $request->input('project_type'),
            'requester_email'     => $request->input('requester_email'),
            'attachment'          => $file
        ]);

        // mail site admin (me)
        if ($request->hasFile('attachment')) {
          Mail::to('someemail@email.com')->send(new SurveyRequestMail($survey, $file));
        } else {
          Mail::to('someemail@email.com')->send(new RequestWithoutAttachment($survey));
        }

       // send email to requester
       Mail::to($request->input('requester_email'))->send(new MailRequester());
        
       // redirect with success message
        return redirect('/project-request')
                    ->with('success', 'Survey Theme Request Was Made Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $project = Project::find($id);

       return view('project.single', ['project' => $project]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
