<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @component(html-elements/head);
    </head>
    <body>
        <div id="app">
            <main>
                @component(v1/components/menu);
                <section>
                    <div class="container">
                        <h1>Authentication</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#configuration">Configuration</a>
                            </li>
                            <li>
                                <a href="#authenticating-users">Authenticating Users</a>
                                <ul>
                                    <li>
                                        <a href="#specifying-additional-conditions">Specifying Additional Conditions</a>
                                    </li>
                                    <li>
                                        <a href="#other-authentication-methods">Other Authentication Methods</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#working-with-authenticated-user">Working With Authenticated User</a>
                                <ul>
                                    <li>
                                        <a href="#protecting-routes">Protecting Routes</a>
                                    </li>
                                    <li>
                                        <a href="#retrieving-the-authenticated-user">Retrieving The Authenticated User</a>
                                    </li>
                                    <li>
                                        <a href="#determining-if-the-current-user-is-authenticated">Determining If The Current User Is Authenticated</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Many web applications provide a means for users to authenticate themselves. Implementing this functionality from scratch can be complex and may lead to security vulnerabilities. Dreamfork offers mechanisms to streamline the authentication process.
                        </p>
                        <p>
                            Authentication in Dreamfork operates on the principles of providers and guards. Guards define how user authentication is performed, while providers specify what constitutes a user for authentication purposes. Dreamfork provides <a href="/docs/1.x/orm">ORM (Object-Relational Mapping)</a> and database query builder, which are utilized in providers.
                        </p>
                        <h2 id="configuration">
                            <a href="#configuration">Configuration</a>
                        </h2>
                        <p>
                            The configuration for authentication in Dreamfork can be found in the file <code>/config/auth.php</code>. Each option available there is thoroughly documented. For example, if you wish to refer to individuals using your application differently than as "users," you can change the model of the provider.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>'providers' => [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'users' => [</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'model' => App\Models\Client::class,</span>
                                    </div>
                                    <div class="line indent">
                                        <span>],</span>
                                    </div>
                                    <div class="line">
                                        <span>],</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="authenticating-users">
                            <a href="#authenticating-users">Authenticating Users</a>
                        </h2>
                        <p>
                            The process of authenticating users in Dreamfork is straightforward. To achieve this, the <code>Auth</code> facade is utilized. Once the facade is imported, the <code>attempt</code> method can be used to attempt a login. If the login is successful, a token can be generated for the user and returned. The <code>attempt</code> method requires passing the fields by which we want to authenticate the user, including the mandatory password field.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Auth;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>public function login($request) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$credentials = $request->validate([</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'login' => ['required'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'password' => ['required'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>]);</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>if (Auth::attempt($credentials)) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>$token = Auth::user()->createToken('user');</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>return response()->json(['token' => $token->plainTextToken]);</span>
                                    </div>
                                    <div class="line indent">
                                        <span>}</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>attempt</code> method takes an array of key/value pairs as its first argument. The values in the array are used to locate the user in your database table. In the given example, the user is retrieved based on the value of the <code>login</code> column. If the user is found, the hashed password stored in the database is compared with the <code>password</code> value passed to the method via the array. It's important not to hash the incoming request's password value, as the framework will automatically hash the value before comparing it to the hashed password in the database. An authenticated session is initiated for the user if the two hashed passwords match.
                        </p>
                        <p>
                            It's worth noting that Dreamfork's authentication services retrieve users from your database based on your authentication guard's "provider" configuration. In the default configuration file <code>/config/auth.php</code>, the ORM user provider is specified, and it's instructed to use the <code>App\Models\User</code> model when retrieving users. You have the flexibility to modify these values within your configuration file to suit the requirements of your application.
                        </p>
                        <p>
                            The <code>attempt</code> method returns true if authentication was successful; otherwise, it returns false.
                        </p>
                        <h3 id="specifying-additional-conditions">
                            <a href="#specifying-additional-conditions">Specifying Additional Conditions</a>
                        </h3>
                        <p>
                            If desired, you can include additional query conditions in the authentication query along with the user's login and password. To achieve this, you can add the query conditions to the array passed to the <code>attempt</code> method. For instance, you might want to ensure that the user is marked as "active":
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Auth;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>public function login($request) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>if (Auth::attempt(['login' => $login, 'password' => $password, 'active' => 1])) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>$token = Auth::user()->createToken('user');</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>return response()->json(['token' => $token->plainTextToken]);</span>
                                    </div>
                                    <div class="line indent">
                                        <span>}</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="other-authentication-methods">
                            <a href="#other-authentication-methods">Other Authentication Methods</a>
                        </h3>
                        <h4 id="authenticate-user-instance">
                            <a href="#authenticate-user-instance">Authenticate A User Instance</a>
                        </h4>
                        <p>
                            If you want to set an existing user instance as the currently authenticated user, you can achieve this by passing the user instance to the <code>Auth</code> facade's <code>login</code> method. The provided user instance must implement the <code>Framework\Services\Auth\Token\Tokenable</code> trait. The <code>App\Models\User</code> model, included with Dreamfork, already satisfies this interface. This authentication method is beneficial when you have a valid user instance, for example, immediately after a user registers with your application:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Auth;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>Auth::login($user);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="working-with-authenticated-user">
                            <a href="#working-with-authenticated-user">Working With Authenticated User</a>
                        </h2>
                        <p>
                            Let's assume that in your application, which serves as a backend API, you have a login mechanism, and a user has already generated an <a href="/docs/1.x/tokenization">authentication token</a>. This token is then used to authenticate each API request. Now, you want to secure the <code>/profile</code> endpoint, which returns user data, allowing access only to authenticated users. To achieve this, you need to have protected route.
                        </p>
                        <h3 id="protecting-routes">
                            <a href="#protecting-routes">Protecting Routes</a>
                        </h3>
                        <p>
                            The protection of routes can be achieved by adding them to a guard. In this manner, access to these routes will only be permitted for authenticated users:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::post('/login', [UserController::class, 'login']);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>Route::guard(function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>Route::get('/profile', [UserController::class, 'me']);</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            In this way, if someone attempts to access this endpoint without providing an authentication token, the guard will prevent the request from proceeding, returning appropriate information.
                        </p>
                        <h3 id="retrieving-the-authenticated-user">
                            <a href="#retrieving-the-authenticated-user">Retrieving The Authenticated User</a>
                        </h3>
                        <p>
                            Dreamfork provides various methods for retrieving the authenticated user. When handling a request sent to a guarded route, you can access the user using three different methods. You can use the <code>Auth</code> facade, the <code>auth()</code> helper function, or directly retrieve the user from the <code>request</code>. Each of these methods achieves the same result:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>public function me($request) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$userWithFacade = Auth::user();</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$userWithRequest = $request->user();</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$userWithHelper = auth()->user();</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            If you want to retrieve only the ID of the authenticated user, you can use the <code>id()</code> method on the <code>Auth</code> facade or helper. Please note that the <code>id()</code> method is not available directly on the <code>request</code> object, as the request handles only the <code>user()</code> method among the authentication-related methods:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                <div class="line">
                                        <span>public function me($request) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$userId = Auth::id(); // Will work</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$userId = auth()->id(); // Will work</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$userId = $request->id(); // Will not work</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="determining-if-the-current-user-is-authenticated">
                            <a href="#determining-if-the-current-user-is-authenticated">Determining If The Current User Is Authenticated</a>
                        </h3>
                        <p>
                            To check if the user making the incoming HTTP request is authenticated, you can use the <code>check</code> method on the <code>Auth</code> facade. This method will return true if the user is authenticated:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>if (Auth::check()) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// The user is authenticated...</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                While it is indeed possible to determine whether a user is authenticated using the <code>check</code> method, it is more common to use a guard on route for verifying the user's authentication status before granting access to specific routes or controllers.
                            </p>
                        </blockquote>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
