<?php

namespace App\Http\Controllers\v1\services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\Tourist;
use Exception;

class UserService extends Controller
{
    public function createData(Request $request) {
        $data = $request->input('data');
        $actionType = $request->input('actionType');
        $userIdRandom = "USER-". random_int(0, 999999);
        $staffIdRandom = "Staff-". random_int(0,999999);
        try{
        switch($actionType){
            case 'addUser':
                $this->addUser(
                    $data['userId'] = $userIdRandom,
                    $data['first_name'],
                    $data['last_name'],
                    $data['middle_name'],
                    $data['contact_number'],
                    $data['address'],
                    $data['email'],
                    $data['password'],
                    $data['gender'],
                    $data['photo']
                );
            break;

            case 'addStaff':
                $this->addStaff(
                    $data['staffId'] = $staffIdRandom,
                    $data['first_name'],
                    $data['last_name'],
                    $data['middle_name'],
                    $data['contact_number'],
                    $data['address'],
                    $data['email'],
                    $data['password'],
                    $data['gender'],
                    $data['photo'],
                    $data['role']
                );
            break;

            case 'addTourist':
                $this->addTourist(
                    $data['first_name'],
                    $data['last_name'],
                    $data['middle_name'],
                    $data['contact_number'],
                    $data['category'],
                    $data['nationality'],
                    $data['email'],
                    $data['gender'],
                    $data['date_in'],
                    $data['date_out']
                );
            break;
            default:
            break;
        }
        return response()->json([
            'message' => 'success'
        ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    private function addUser($userId, $firstName, $lastName, $middleName, $contactNumber, $address, $email, $password, $gender, $photo) {
        User::create([
            'userId' => $userId,
           'first_name' => $firstName,
            'last_name' => $lastName,
            'middle_name' => $middleName,
            'contact_number' => $contactNumber,
            'address' => $address,
            'email' => $email,
            'password' => $password,
            'gender' => $gender,
            'photo' => $photo
        ]);
    }

    private function addStaff($staffId, $firstName, $lastName, $middleName, $contactNumber, $address, $email, $password, $gender, $photo, $role) {
        Staff::create([
            'staffId' => $staffId,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'middle_name' => $middleName,
            'contact_number' => $contactNumber,
            'address' => $address,
            'email' => $email,
            'password' => $password,
            'gender' => $gender,
            'photo' => $photo,
            'role' => $role
        ]);
    }

    private function addTourist($firstName, $lastName, $middleName, $contactNumber, $category, $nationality, $email, $gender, $dateIn, $dateOut) {
        Tourist::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'middle_name' => $middleName,
            'contact_number' => $contactNumber,
            'category' => $category,
            'nationality' => $nationality,
            'email' => $email,
            'gender' => $gender,
            'date_in' => $dateIn,
            'date_out' => $dateOut
        ]);
    }
}
