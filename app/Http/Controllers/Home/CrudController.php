<?php

    namespace App\Http\Controllers\Home;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    /**
     * Class CrudController
     *
     * @package App\Http\Controllers\Auth
     */
    class CrudController
        extends Controller
    {
        /**
         * Where to redirect users.
         *
         * @var string
         */
        protected $redirect_to = '';

        /**
         * Where to redirect users after login.
         *
         * @var array
         */
        protected $valid_links = [];

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('guest');

            $exploded   = explode(':', env('APP_RESEARCH_LINK_ADDITIONS', ['one:two']));
            $collection = collect();
            foreach ($exploded as $item) {
                $collection->push(['key' => $item]);
            }

            $this->redirect_to = env('APP_RESEARCH_LINK', 'research.example.com');
            $this->valid_links = $collection;
        }

        public function index(Request $request)
        {
            $route = '';

            if (
                $request->has('id')
                && null !== $request->input('id')
            ) {
                $key = $this->valid_links->where('key', $request->input('id'))
                                         ->first()['key'];

                if (null !== $key) {
                    $route .= $this->redirect_to . $key;
                }
            }

            return view('welcome', compact(['route']));
        }
    }
