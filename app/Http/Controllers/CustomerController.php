<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class CustomerController extends Controller
{
        // Validating the code was not modified
    protected static function validateCode($code){
        if($code != "xmxwebdemo2"){
            return false;
        }
        return true;
    }

    // Validating username comp
    protected static function validateUser($user){
        // Validating $user field length
        if (strlen($user) != 6) {
            return false;
        }
        // Validating start with XMX
        $pattern = '/^XMX/';
        if (!preg_match($pattern,$user)) {
            return false;
        }
        return true;
    }

    // Validating client's name
    protected static function validateName($name){
        if (strlen($name) < 5 || strlen($name) > 15) {
            return false;
        }
        return true;
    }

    // Validate client's job name
    protected static function validateJob($job){
        if (strlen($job) < 5 || ($job) > 10) {
            return false;
        }
        return true;
    }

    // Validating client's phone
    protected static function validatePhone($phone){
        // Validating length
        if (strlen($phone) != 7) {
            return false;
        }
        $pattern = '/\D/';
        // Validating only numbers
        if (preg_match($pattern,$phone)) {
            return false;
        }
        return true;
    }

    protected static function validateEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    protected static function generatePassword($lettersLim = 4, $numbersLim = 4) {
        //Setting possible values
        $numbers = '0123456789';
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //Getting length of possible chars
        $nl = strlen($numbers);
        $ll = strlen($letters);
        //Initializating
        $randomString = '';
        for ($i = 0; $i < $lettersLim; $i++) {
            $randomString .= $letters[rand(1, $ll - 1)];
        }
        for ($j = 0; $j < $numbersLim; $j++) {
            $randomString .= $numbers[rand(0, $nl - 1)];
        }
        return $randomString;
    }

    public static function createCustomer(){

        // Setting data as valid by default
        $validData = true;
        $data = $_POST;
        // Running validation functions
        if (!self::validateCode($data['clientCode'])) {
            ViewController::errorView('El código fue alterado');
        }

        if (!self::validateUser($data['user'])) {
            ViewController::errorView('El usuario debe iniciar con las letras "XMX" y debe tener una longitud de 6 caracteres');
        }

        if (!self::validateName($data['name'])) {
            ViewController::errorView('El nombre debe contener entre 5 y 15 caracteres!');
        }

        if (!self::validateJob($data['job'])) {
            ViewController::errorView('El nombre del cargo debe contener entre 5 y 10 caracteres!');
        }

        if (!self::validatePhone($data['phone'])) {
            ViewController::errorView('El teléfono debe tener una longitud de 7 caracteres y solo contener números (El código de pais se agregará de forma automática)');
        }

        if (!self::validateEmail($data['email'])) {
            ViewController::errorView('El correo electrónico ingresado no tiene un formato válido!');
        }

        // Generating password

        // Storing user data
        $customer = new App\Customer();
        $customer->code = $data['clientCode'];
        $customer->user = $data['user'];
        $customer->name = $data['name'];
        $customer->password = self::generatePassword();
        $customer->email = $data['email'];
        $customer->job = $data['job'];
        $customer->phone = '+57'.$data['phone'];
        $customer->mobile = $data['mobile'];
        $customer->type = $data['type'];
        if (isset($data['webstoreAuth'])) {
            $customer->webstore_auth = true;
        }
        if (isset($data['orderAuth'])) {
            $customer->order_auth = true;
        }
        if (isset($data['passwordSend'])) {
            $customer->password_send = true;
        }
        //If data stored correctly return the form with alert for success, otherwise return error
        if ($customer->save()) {
            return view('layouts.form',['code'=>'xmxwebdemo2','created'=>true]);
        }else{
            return view('layouts.error',['message' => 'Problemas al guardar los datos']);
        }
    }

    public static function readCustomers(){
        // Get all customers data
        $customers = App\Customer::all();

        // Render table
        return view('layouts.table',['customers' => $customers]);
    }
}
