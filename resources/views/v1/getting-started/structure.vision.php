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
                        <h1>Directory Structure</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#the-root-directory">The Root Directory</a>
                                <ul>
                                    <li>
                                        <a href="#the-root-app-directory">The app Directory</a>
                                    </li>
                                    <li>
                                        <a href="#the-bootstrap-directory">The bootstrap Directory</a>
                                    </li>
                                    <li>
                                        <a href="#the-config-directory">The config Directory</a>
                                    </li>
                                    <li>
                                        <a href="#the-database-directory">The database Directory</a>
                                    </li>
                                    <li>
                                        <a href="#the-framework-directory">The framework Directory</a>
                                    </li>
                                    <li>
                                        <a href="#the-public-directory">The public Directory</a>
                                    </li>
                                    <li>
                                        <a href="#the-resources-directory">The resources Directory</a>
                                    </li>
                                    <li>
                                        <a href="#the-routes-directory">The routes Directory</a>
                                    </li>
                                    <li>
                                        <a href="#the-storage-directory">The storage Directory</a>
                                    </li>
                                    <li>
                                        <a href="#the-vendor-directory">The vendor Directory</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#the-app-directory">The App Directory</a>
                                <ul>
                                    <li>
                                        <a href="#the-controllers-directory">The Controllers Directory</a>
                                    </li>
                                    <li>
                                        <a href="#the-exceptions-directory">The Exceptions Directory</a>
                                    </li>
                                    <li>
                                        <a href="#the-models-directory">The Models Directory</a>
                                    </li>
                                    <li>
                                        <a href="#the-providers-directory">The Providers Directory</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            The default directory structure of the Dreamfork application is crafted to provide a solid foundation for projects of different scopes. You have the freedom to organize your application according to your preferences, as Dreamfork places almost no restrictions on where any given class is located, as long as Composer can autoload the class.
                        </p>
                        <h2 id="the-root-directory">
                            <a href="#the-root-directory">The Root Directory</a>
                        </h2>
                        <h4 id="the-root-app-directory">
                            <a href="#the-root-app-directory">The App Directory</a>
                        </h4>
                        <p>
                            The <code>app</code> directory holds the fundamental code for your application, serving as the primary location for most of your application's classes.
                        </p>
                        <h4 id="the-bootstrap-directory">
                            <a href="#the-bootstrap-directory">The Bootstrap Directory</a>
                        </h4>
                        <p>
                            The <code>bootstrap</code> directory houses the <code>app.php</code> file, responsible for bootstrapping the framework. Generally, there is no need to make modifications to any files within this directory.
                        </p>
                        <h4 id="the-config-directory">
                            <a href="#the-config-directory">The Config Directory</a>
                        </h4>
                        <p>
                            The <code>config</code> directory, as the name implies, contains all the configuration files for your application. It's a good idea to go through these files and get to know the various options available to you.
                        </p>
                        <h4 id="the-database-directory">
                            <a href="#the-database-directory">The Database Directory</a>
                        </h4>
                        <p>
                            The <code>database</code> directory contains your database migrations.
                        </p>
                        <h4 id="the-framework-directory">
                            <a href="#the-framework-directory">The Framework Directory</a>
                        </h4>
                        <p>
                            The <code>framework</code> directory contains all the essential files that form the foundation of the framework. Changes to this directory should be made only when you intend to enhance the core functionality of the framework for your application. It serves as the backbone, and any modifications should be approached with caution, reserved for cases where you are extending the framework's core features to suit your application's needs.
                        </p>
                        <h4 id="the-public-directory">
                            <a href="#the-public-directory">The Public Directory</a>
                        </h4>
                        <p>
                            The <code>public</code> directory hosts the index.php file, serving as the entry point for all incoming requests to your application and configuring autoloading. Additionally, this directory stores your assets, including images, JavaScript, and CSS.
                        </p>
                        <h4 id="the-resources-directory">
                            <a href="#the-resources-directory">The Resources Directory</a>
                        </h4>
                        <p>
                            The <code>resources</code> directory houses your views along with your uncompiled assets, such as CSS or JavaScript.
                        </p>
                        <h4 id="the-routes-directory">
                            <a href="#the-routes-directory">The Routes Directory</a>
                        </h4>
                        <p>
                            The <code>routes</code> directory encompasses all route definitions for your application. Dreamfork comes with default route files: <code>web.php</code> and <code>api.php</code>.
                        </p>
                        <p>
                            The <code>web.php</code> file includes routes that the <code>RouteServiceProvider</code> assigns to the <code>web</code> middleware group. If your application doesn't provide a stateless, RESTful API, most of your routes will likely be defined in the <code>web.php</code> file.
                        </p>
                        <p>
                            The <code>api.php</code> file includes routes that the <code>RouteServiceProvider</code> assigns to the <code>api</code> middleware group. These routes are designed to be stateless. Requests entering the application through these routes are meant to be authenticated via tokens and won't have access to session state.
                        </p>
                        <h4 id="the-storage-directory">
                            <a href="#the-storage-directory">The Storage Directory</a>
                        </h4>
                        <p>
                            The <code>storage</code> directory houses your logs, compiled Vision templates, and other files generated by the framework. It is organized into <code>app</code>, <code>framework</code> and <code>logs</code> directories. The <code>app</code> directory is suitable for storing any files generated by your application. The <code>framework</code> directory is designated for framework-generated files and caches. Lastly, the <code>logs</code> directory contains your application's log files.
                        </p>
                        <p>
                            For user-generated files, like images, styles, and scripts that need to be publicly accessible, you can utilize the <code>storage/app/public</code> directory. To make these files accessible to the public, create a symbolic link at <code>public/storage</code> pointing to this directory. You can achieve this by executing the <code>php dfork storage:link</code> command or <code>php dfork storage:unlink</code> to unlink symbolic link.
                        </p>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                It is possible to create symbolic link to <code>storage/app/public</code> with a custom defined name, allowing files to be accessed under the specified name. This can be achieved using the <code>php dfork storage:link custom_name</code> command.
                            </p>
                        </blockquote>
                        <h4 id="the-vendor-directory">
                            <a href="#the-vendor-directory">The Vendor Directory</a>
                        </h4>
                        <p>
                            The <code>vendor</code> directory contains your Composer dependencies.
                        </p>
                        <h2 id="the-app-directory">
                            <a href="#the-app-directory">The App Directory</a>
                        </h2>
                        <h4 id="the-controllers-directory">
                            <a href="#the-controllers-directory">The Controllers Directory</a>
                        </h4>
                        <p>
                            The <code>controllers</code> directory stores controllers that utilize models. Almost all of the logic responsible for handling requests entering your application will be found in this directory.
                        </p>
                        <h4 id="the-exceptions-directory">
                            <a href="#the-exceptions-directory">The Exceptions Directory</a>
                        </h4>
                        <p>
                            The <code>exceptions</code> directory houses your application's exception handler and serves as a suitable location for any exceptions thrown by your application. If you wish to customize the way your exceptions are logged or rendered, you should make adjustments to the <code>Handler</code> class within this directory.
                        </p>
                        <h4 id="the-models-directory">
                            <a href="#the-models-directory">The Models Directory</a>
                        </h4>
                        <p>
                            The <code>models</code> encompasses all of your ORM model classes. The ORM included with Dreamfork offers a straightforward implementation for interacting with your database. Each database table has a corresponding "Model" that facilitates interaction with that table. Models enable you to query data from your tables and insert new records into the table.
                        </p>
                        <h4 id="the-providers-directory">
                            <a href="#the-providers-directory">The Providers Directory</a>
                        </h4>
                        <p>
                            The <code>providers</code>  houses all the service providers for your application. Service providers assist in bootstrapping your application. Currently, it is not supported to easily create your own providers.
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
