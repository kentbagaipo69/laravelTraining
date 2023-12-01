<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Contact\Contacts;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function index(Request $request):View
    {

        // search input
		$searchVal = $request->search ?? null;
    
		// users
		// paginate with query
		$contactlists = Contacts::where('first_name', 'LIKE', '%'.$searchVal.'%')->
        whereNot('id', auth()->user()->id)->paginate(5)->withQueryString();
		
		return view('contact.index', compact('contactlists', 'searchVal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request):RedirectResponse
    {
        $validated = $request->validated();
        $contact= new Contacts;
        $contact->first_name = $validated['first_name'];
        $contact->last_name = $validated['last_name'];
        $contact->email_address = $validated['email_address'];
        $contact->middle_name= $validated['middle_name'];
				$contact->barangay = $validated['barangay'];
				$contact->street = $validated['street'];
        $contact->save();
        
        return redirect()->route('contacts.index')->with('status', 'Contact has been successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacts $contact):View
    {
        $canEdit=false;
        return view('contact.show', compact('contact','canEdit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacts $contact):View
    { 
        $canEdit=true;
        return view('contact.show', compact('contact','canEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contacts $contact):RedirectResponse
    {
        $validated = $request->validated();

        $contact->first_name = $validated['first_name'];
        $contact->last_name = $validated['last_name'];
        $contact->email_address = $validated['email_address'];
        $contact->middle_name= $validated['middle_name'];
				$contact->barangay = $validated['barangay'];
				$contact->street = $validated['street'];
       
        $contact->update();
   
        return redirect()->route('contacts.index')->with('status', 'Contact has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacts $contact)
    {
       $contact->delete();
       return redirect()->route('contacts.index')->with('status', 'Contact has been successfully deleted.');
    }
		public function getId(Contacts $contact):View{
			dd($contact);
			$selContact=$contact;
			return view('contact.index', compact('contact','selContact'));
		}
	}
