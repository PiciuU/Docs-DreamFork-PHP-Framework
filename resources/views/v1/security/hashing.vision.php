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
                        <h1>Hashing</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#basic-usage">Basic Usage</a>
                                <ul>
                                    <li>
                                        <a href="#hashing-password">Hashing Passwords</a>
                                    </li>
                                    <li>
                                        <a href="#adjusting-the-bcrypt-work-factor">Adjusting The Bcrypt Work Factor</a>
                                    </li>
                                    <li>
                                        <a href=" #verifying-that-a-password-matches-a-hash">Verifying That A Password Matches A Hash</a>
                                    </li>
                                    <li>
                                        <a href="#determining-if-a-password-needs-to-be-rehashed">Determining If A Password Needs To Be Rehashed</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            The Dreamfork <code>Hash</code> facade provides secure Bcrypt hashing for storing user passwords.
                        </p>
                        <p>
                            Bcrypt is an excellent choice for password hashing due to its adjustable "work factor." This means that the time it takes to generate a hash can be increased as hardware power increases. When hashing passwords, a slower process is favorable. The longer an algorithm takes to hash a password, the more time it takes for malicious users to generate "rainbow tables" containing all possible string hash values. This adds a layer of defense against brute force attacks on applications.
                        </p>
                        <h2 id="basic-usage">
                            <a href="#basic-usage">Basic Usage</a>
                        </h2>
                        <h3 id="hashing-password">
                            <a href="#hashing-password">Hashing Passwords</a>
                        </h3>
                        <p>
                            You may hash a password by calling the <code>make</code> method on the <code>Hash</code> facade:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Hash;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$hash = Hash::make($request->password);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="adjusting-the-bcrypt-work-factor">
                            <a href="#adjusting-the-bcrypt-work-factor">Adjusting The Bcrypt Work Factor</a>
                        </h3>
                        <p>
                            If you are utilizing the Bcrypt algorithm, the <code>make</code> method enables you to adjust the work factor of the algorithm through the <code>rounds</code> option. Nevertheless, the default work factor managed by Dreamfork is suitable for most applications:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Hash;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$hash = Hash::make($request->password, [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'rounds' => 12,</span>
                                    </div>
                                    <div class="line">
                                        <span>]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="verifying-that-a-password-matches-a-hash">
                            <a href=" #verifying-that-a-password-matches-a-hash">Verifying That A Password Matches A Hash</a>
                        </h3>
                        <p>
                            The <code>check</code> method provided by the <code>Hash</code> facade enables you to verify that a given plain-text string corresponds to a given hash:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>if (Hash::check('plain-password', $hashedPassword)) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// The passwords match...</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="determining-if-a-password-needs-to-be-rehashed">
                            <a href="#determining-if-a-password-needs-to-be-rehashed">Determining If A Password Needs To Be Rehashed</a>
                        </h3>
                        <p>
                            The <code>needsRehash</code> method, offered by the <code>Hash</code> facade, allows you to determine if the work factor used by the hasher has changed since the password was hashed. Some applications choose to perform this check during the authentication process:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>if (Hash::needsRehash($hashedPassword)) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$hashed = Hash::make('plain-password');</span>
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
