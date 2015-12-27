<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller {

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->all();

        return view('users.index', compact('users'));

    }

    public function destroy($id)
    {
        $this->userRepository->findById($id)->delete();

        Flash::info('User deleted');

        return redirect()->back();
    }
}
