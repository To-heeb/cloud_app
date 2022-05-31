<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Contact extends Model
{
    use HasFactory;
    protected $primaryKey = 'contact_id';

    //function to inser contacts
    public static function insertContact($request){

    	$userid = Auth::user()->user_id;

    	//raw query to insert
    	$result = DB::insert('INSERT INTO contacts(user_id, fullname, shortname, biography, gender, phonenumber, workphone, emailaddress, contactaddress, meet_at) VALUES(?,?,?,?,?,?,?,?,?,?)', [$userid, $request->fullname, $request->shortname, $request->biography, $request->gender, $request->phonenumber, $request->workphone, $request->emailaddress, $request->contactaddress, $request->meet_at]);

    	return $result;
    }

    public static function getContact(){
    	//raw query
    	$result = DB::select('SELECT * FROM contacts');

        //query builder
        $result2 = DB::table('contacts')->get();

    	return $result;
    }

    public static function getContacts($id){
        //raw query
        $result = DB::select('SELECT * FROM contacts WHERE contact_id=?', [$id]);

        //query builder
        $result2 = DB::table('contacts')->where('contact_id', $id)->first();//first will fetch only one row;

        //eloquence ORM
        $result3 = Contact::find($id);

        return $result3;


    }

    public static function updateContact($request){
        //raw query
       /* $result = DB::update("UPDATE contacts SET fullname=?, shortname=?, biography=?, gender=?, phonenumber=?, workphone=?, emailaddress=?, contactaddress=?, meet_at=? WHERE contact_id=?", [$request->fullname, $request->shortname, $request->biography, $request->gender, $request->phonenumber, $request->workphone, $request->emailaddress, $request->contactaddress, $request->meet_at, $request->contactid] );*/

        //eloquence
        $mycontact = Contact::find($request->contactid);
        $mycontact->fullname = $request->fullname;
        $mycontact->shortname = $request->shortname;
        $mycontact->biography = $request->biography;
        $mycontact->gender = $request->gender;
        $mycontact->phonenumber = $request->phonenumber;
        $mycontact->workphone = $request->workphone;
        $mycontact->emailaddress = $request->emailaddress;
        $mycontact->contactaddress = $request->contactaddress;
        $mycontact->meet_at = $request->meet_at;

        if ($mycontact->save()) {
            return true;
        }
    }


    public static function deleteContact($id){
        //raw sql query
       // $result = DB::delete('DELETE FROM contacts WHERE contact_id=?', [$id]);

        //query builder
        //DB::table('contact')->where('contact_id', $id)->delete();

        //eloquent ORM
        $mycontact = Contact::find($id);
        if ($mycontact->delete()) {
            return true;
        }

    }
}
