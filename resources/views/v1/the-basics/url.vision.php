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
                        <h1>URL</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#the-basics">The Basics</a>
                                <ul>
                                    <li>
                                        <a href="#accessing-the-current-url">Accessing The Current URL</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Dreamfork provides a set of simple helpers to assist you in generating and managing URLs for your application. These helpers can be invaluable for building links in views or API responses.
                        </p>
                        <h2 id="the-basics">
                            <a href="#the-basics">The Basics</a>
                        </h2>
                        <p>
                            The <code>url</code> helper in Dreamfork can be used to generate URLs for your application. The generated URL will automatically use the scheme (HTTP or HTTPS) and host from the current request being handled by the application:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$user = App\Models\User::find(1);</span>
                                    </div>
                                    <div class="line">
                                        <span>echo url("/user/{$user->id}");</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="accessing-the-current-url">
                            <a href="#accessing-the-current-url">Accessing The Current URL</a>
                        </h3>
                        <p>
                            If no path is provided to the <code>url</code> helper, an instance of <code>Framework\Services\URL\UrlGenerator</code> is returned, allowing access to the <code>current()</code> function, which returns the current path:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>echo url()->current();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Each of the methods chained after <code>url</code> may also be accessed via the URL facade:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\URL;</span>
                                    </div>
                                    <div class="line">
                                        <span>echo URL::current()</span>
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
