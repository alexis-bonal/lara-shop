<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Contact;

    class ContactController extends Controller
    {
        public function showForm()
            {
                return view('contact');
            }

            public function submitForm(Request $request)
            {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                    'message' => 'required|string',
                ]);

                Contact::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'message' => $request->message,
                ]);

                return redirect()->route('contact.show')->with('success', 'Votre message a été envoyé avec succès.');
            }
        }
?>
