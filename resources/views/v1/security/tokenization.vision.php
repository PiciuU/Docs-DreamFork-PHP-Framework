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
                        <h1>Tokenization</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                                <ul>
                                    <li>
                                        <a href="#how-it-works">How It Works</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#api-token-authentication">API Token Authentication</a>
                                <ul>
                                    <li>
                                        <a href="#issuing-api-tokens">Issuing API Tokens</a>
                                    </li>
                                    <li>
                                        <a href="#protecting-routes">Protecting Routes</a>
                                    </li>
                                    <li>
                                        <a href="#revoking-tokens">Revoking Tokens</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Tokenization is a feature provided by Dreamfork, enabling the generation of authentication tokens commonly used for backend API authentication.
                        </p>
                        <h3 id="how-it-works">
                            <a href="#how-it-works">How It Works</a>
                        </h3>
                        <p>
                            Upon successful login, a user is issued a token, which should then be sent to the application as Bearer Authentication. The request sent by user is authenticated based on this token.
                        </p>
                        <h2 id="api-token-authentication">
                            <a href="#api-token-authentication">API Token Authentication</a>
                        </h2>
                        <h3 id="issuing-api-tokens">
                            <a href="#issuing-api-tokens">Issuing API Tokens</a>
                        </h3>
                        <p>
                            Tokenization allows you to generate API tokens, also known as personal access tokens, which can be used to authenticate API requests to your application. When making requests using API tokens, ensure that the token is included in the <code>Authorization</code> header as a <code>Bearer</code> token.
                        </p>
                        <p>
                            To begin issuing tokens for users, your User model should utilize the <code>Framework\Services\Auth\Token\Tokenable</code> trait and <code>Framework\Services\Auth\Traits\Authenticatable</code> trait. The default User model provided by the framework already incorporates all the required traits for issuing and resolving tokens.
                        </p>
                        <p>
                            To issue a token, you can use the <code>createToken</code> method. This method returns a <code>Framework\Services\Auth\Token\NewAccessToken</code> instance. API tokens are hashed using SHA-256 before being stored in your database. However, you can access the plain-text value of the token using the <code>plainTextToken</code> property of the <code>NewAccessToken</code> instance. It's important to display this value to the user immediately after the token is created.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line ">
                                        <span>$token = Auth::user()->createToken('user');</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>return response()->json(['token' => $token->plainTextToken]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>createToken</code> method takes two arguments. The first argument is the token's name, allowing you to specify the type of person for whom the token is generated—such as user, moderator, or admin. The default value is user. As the second argument, you can specify when the token should expire. The default value is null, indicating that the token will remain active until explicitly revoked.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line ">
                                        <span>$token = Auth::user()->createToken('user', date('2023-12-31 00:00:00'));</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>return response()->json(['token' => $token->plainTextToken]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            You can access all of the user's tokens using the <code>tokens</code> relationship provided by the <code>Tokenable</code> trait:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line ">
                                        <span>foreach($request->user()->tokens() as $token) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// ...</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="protecting-routes">
                            <a href="#protecting-routes">Protecting Routes</a>
                        </h3>
                        <p>
                            To protect routes and require authentication for all incoming requests, you should attach the guard to your protected routes within your <code>routes/web.php</code> and <code>routes/api.php</code> route files. This guard ensures that incoming requests are authenticated and contain a valid API token header.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::guard(function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>Route::get('/user', [UserController::class, 'user']);</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="revoking-tokens">
                            <a href="#revoking-tokens">Revoking Tokens</a>
                        </h3>
                        <p>
                            Revoking tokens is done by deleting them from your database. To achieve this, you can either perform the action on the currently used token by the user or list all user tokens and delete them one by one in a loop.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>// Revoke the token used for authenticating the current request...</span>
                                    </div>
                                    <div class="line">
                                        <span>$request->user()->currentAccessToken->delete();</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>// Revoke all tokens...</span>
                                    </div>
                                    <div class="line ">
                                        <span>foreach($request->user()->tokens() as $token) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$token->delete();<span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
