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
                        <h1>Examples Of Usage</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#dreamfork-documentation-website">Dreamfork Documentation Website</a>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            If you're eager to witness real-world implementations of projects leveraging Dreamfork, you're in the right place. This section provides a collection of public projects along with their source code and detailed descriptions. Whether you're seeking inspiration or just curious about how others have employed this framework, feel free to explore the showcased examples.
                        </p>
                        <h2 id="dreamfork-documentation-website">
                            <a href="#dreamfork-documentation-website">Dreamfork Documentation Website</a>
                        </h2>
                        <p>
                            The very platform you are navigating right now serves as an illustration of Dreamfork's capabilities in action. This documentation website is the first project on the list, and its source code is publicly available for exploration. Leveraging the framework's frontend functionalities, particularly Vision views, this site exemplifies the use of Dreamfork in a real-world application.
                        </p>
                        <p>
                            Project Repository: <a href="https://github.com/PiciuU/Docs-Dreamfork-PHP-Framework">https://github.com/PiciuU/Docs-Dreamfork-PHP-Framework</a>
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
