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
                        <h1>Installation</h1>
                        <ul>
                            <li>
                                <a href="#about-dreamfork">About Dreamfork</a>
                                <ul>
                                    <li>
                                    <a href="#when-to-use-dreamfork">When to use Dreamfork?</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#creating-a-dreamfork-project">Creating A Dreamfork Project</a>
                            </li>
                            <li>
                                <a href="#initial-configuration">Initial Configuration</a>
                                <ul>
                                    <li>
                                        <a href="#environment-based-configuration">Environment Based Configuration</a>
                                    </li>
                                    <li>
                                        <a href="#databases-and-migrations">Databases & Migrations</a>
                                    </li>
                                    <li>
                                        <a href="#directory-configuration">Directory Configuration</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#next-steps">Next Steps</a>
                                <ul>
                                    <li>
                                        <a href="#dreamfork-the-full-stack-framework">Dreamfork The Full Stack Framework</a>
                                    </li>
                                    <li>
                                        <a href="#dreamfork-the-api-backend">Dreamfork The Api Backend</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="about-dreamfork">
                            <a href="#about-dreamfork">About Dreamfork</a>
                        </h2>
                        <p>
                            DreamFork is a lightweight web application framework designed to facilitate the development of web applications. Drawing inspiration from <a href="https://laravel.com" target="_blank">Laravel</a>, it strives to incorporate various Laravel features while maintaining a significantly smaller size. This emphasis on a streamlined codebase contributes to DreamFork's faster performance compared to Laravel, albeit with some trade-offs in terms of security.
                        </p>
                        <p>
                            Developed by a solo developer, DreamFork aims to provide a Laravel-like toolset while offering a smaller footprint. It is essential to note that, due to its smaller development team and evolving nature, DreamFork may have some limitations and imperfections.
                        </p>
                        <p>
                            The framework serves as a starting point for developers familiar with Laravel, offering a structured foundation. Leveraging straightforward mechanisms like dependency injection and service isolation, DreamFork prioritizes modularity and provides intuitive ways to extend and enhance projects. This approach allows developers to build upon a familiar Laravel base while enjoying the benefits of a more lightweight and performance-oriented framework.
                        </p>
                        <p>
                            This documentation serves as a comprehensive guide to help developers grasp the fundamental workings of the DreamFork framework. It is intended to offer insights into the core concepts and functionalities, providing a clear understanding of how to leverage DreamFork in your projects.
                        </p>
                        <h3 id="when-to-use-dreamfork">
                            <a href="#when-to-use-dreamfork">When to use Dreamfork</a>
                        </h3>
                        <p>
                            DreamFork is primarily designed for projects related to personal learning or non-critical applications where flawless and secure operation is not an absolute necessity. It is well-suited for endeavors such as personal learning projects, experimental applications, or projects that do not demand the robustness required for critical systems like e-commerce platforms or subscription-based websites.
                        </p>
                        <h4>Learning PHP Frameworks:</h4>
                        <p>
                            DreamFork provides an excellent entry point for individuals embarking on their journey with PHP frameworks. Its smaller and more straightforward architecture offers a less overwhelming experience compared to larger frameworks like Laravel or Symfony. This makes it particularly suitable for those looking to familiarize themselves with the structural and organizational aspects commonly found in prominent PHP frameworks.
                        </p>
                        <h4>Simplified Projects:</h4>
                        <p>
                            For developers aiming to create straightforward projects without compromising on the power and versatility of established PHP frameworks, DreamFork is an apt choice. It strikes a balance between simplicity and functionality, making it suitable for small to medium-sized applications.
                        </p>
                        <h4>Exploration and Experimentation:</h4>
                        <p>
                            DreamFork is well-suited for exploration and experimentation, allowing developers to try out ideas and implement features in a more lightweight environment. Its modular structure encourages developers to extend and modify the framework to suit their specific needs.
                        </p>
                        <h2 id="creating-a-dreamfork-project">
                            <a href="#creating-a-dreamfork-project">Creating A Dreamfork Project</a>
                        </h2>
                        <p>
                            Before initiating your first DreamFork project, ensure that your local machine is equipped with PHP and <a href="https://getcomposer.org" target="_blank">Composer</a>. Additionally, having <a href="https://git-scm.com">Git</a> installed is a prerequisite. We also recommend installing <a href="https://nodejs.org/en" target="_blank">Node and NPM</a> for enhanced capabilities.
                        </p>
                        <p>
                            After successfully installing PHP and Composer, follow these steps to create a new DreamFork project by cloning the <a href="https://github.com/PiciuU/DreamFork-PHP-Framework">repository</a> using the terminal:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>git clone https://github.com/PiciuU/DreamFork-PHP-Framework.git</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Once the project has been created, navigate to the project folder and create a copy of <code>.env.example</code>, renaming it to <code>.env</code>. Additionally, remove the <code>.git</code> folder, which represents the Git repository of the framework:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>mv DreamFork-PHP-Framework example-app</span>
                                    </div>
                                    <div class="line">
                                        <span>cd example-app</span>
                                    </div>
                                    <div class="line">
                                        <span>cp .env.example .env</span>
                                    </div>
                                    <div class="line">
                                        <span>rmdir /s .git</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Next, install the project dependencies using Composer:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>composer install</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            With the project dependencies installed, you can launch the development server. While <a href="https://laragon.org/">Laragon</a> is recommended, you can also use PHP's built-in web server:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>php -S localhost:8000 -t public/</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Once the development server is running, access your application in the web browser at <a href="http://localhost:8000">http://localhost:8000</a> or at the path provided by Laragon or your chosen development environment.
                        </p>
                        <h2 id="initial-configuration">
                            <a href="#initial-configuration">Initial Configuration</a>
                        </h2>
                        <p>
                            All configuration files for the DreamFork framework are centralized in the <code>config</code> directory. Each configuration option is thoroughly documented, providing transparency on the available settings.
                        </p>
                        <p>
                            DreamFork is designed to require minimal additional configuration, allowing developers to start coding immediately. However, it's advisable to review the <code>config/app.php</code> file and its documentation. This file encompasses various options, including settings for timezone and locale, which you may consider adjusting to align with your application's specific requirements.
                        </p>
                        <h3 id="environment-based-configuration">
                            <a href="#environment-based-configuration">
                                Environment Based Configuration
                            </a>
                        </h3>
                        <p>
                            Given that various configuration options in DreamFork may differ based on whether your application is running locally or on a production web server, crucial configuration values are specified in the <code>.env</code> file located at the root of your application.
                        </p>
                        <p>
                            It is imperative not to include the <code>.env</code> file in your application's source control. This precaution is taken because each developer or server utilizing your application may require a distinct environment configuration. Moreover, committing the <code>.env</code> file would pose a security risk in the event of unauthorized access to your source control repository, potentially exposing sensitive credentials.
                        </p>
                        <h3 id="databases-and-migrations">
                            <a href="#databases-and-migrations">
                                Databases & Migrations
                            </a>
                        </h3>
                        <p>
                            If your application needs to store data in a database, DreamFork currently supports only MySQL. By default, the basic database connection settings are defined in the <code>.env</code> file, and you can customize them according to your needs.
                        </p>
                        <p>
                            If your project involves authentication mechanisms, you need to migrate the relevant tables to your database. These tables are located in the <code>database/migrations</code> folder. Currently, the framework doesn't provide automatic migrations, so you need to perform them manually. Each migration file contains a prepared SQL command to create the required table. Execute these commands to set up the necessary tables in your database.
                        </p>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                "Personal Access Tokens" table structure must precisely match the one defined in the migration file. The framework currently does not support modifications to this table.
                            </p>
                        </blockquote>
                        <h3 id="directory-configuration">
                            <a href="#directory-configuration">
                                Directory Configuration
                            </a>
                        </h3>
                        <p>
                            Dreamfork should always be served from the root of the "web directory" configured for your web server. Avoid attempting to serve a Dreamfork application from a subdirectory within the "web directory" as this may inadvertently expose sensitive files present within your application.
                        </p>
                        <h2 id="next-steps">
                            <a href="#next-steps">Next steps</a>
                        </h2>
                        <p>
                            Now that you have created your Dreamfork project, you may be wondering about the next steps in your learning journey. First and foremost, we strongly recommend gaining familiarity with the inner workings of Dreamfork by exploring the following documentation:
                        </p>
                        <div class="content-list">
                            <ul>
                                <li>
                                    <a href="/docs/1.x/lifecycle">Request Lifecycle</a>
                                </li>
                                <li>
                                    <a href="/docs/1.x/configuration">Configuration</a>
                                </li>
                                <li>
                                    <a href="/docs/1.x/structure">Directory Structure</a>
                                </li>
                                <li>
                                    <a href="/docs/1.x/frontend">Frontend</a>
                                </li>
                                <li>
                                    <a href="/docs/1.x/container">Service Container</a>
                                </li>
                                <li>
                                    <a href="/docs/1.x/facades">Facades</a>
                                </li>
                            </ul>
                        </div>
                        <p>
                            Additionally, the path you choose for utilizing Dreamfork will influence the subsequent steps in your journey. There are various approaches to leveraging Dreamfork, and we will delve into two primary use cases for the framework below.
                        </p>
                        <h3 id="dreamfork-the-full-stack-framework">
                            <a href="#dreamfork-the-full-stack-framework">
                                Dreamfork The Full Stack Framework
                            </a>
                        </h3>
                        <p>
                            Dreamfork can serve as a full-stack framework, where it handles routing requests to your application and facilitates rendering your frontend using the <a href="/docs/1.x/vision">Vision template engine</a>. Utilizing Dreamfork in this manner is possible; however, it is not recommended due to the absence of certain mechanisms, such as session handling.
                        </p>
                        <p>
                            It's also important to note that, as of now, the template engine is not as advanced, limiting its ability to create more sophisticated views. Due to this limitation, the second approach is generally recommended for a more comprehensive and feature-rich experience.
                        </p>
                        <h3 id="dreamfork-the-api-backend">
                            <a href="#dreamfork-the-api-backend">
                                Dreamfork The Api Backend
                            </a>
                        </h3>
                        <p>
                            Dreamfork is ideally suited for use as an API backend, with the frontend built on technologies like Vue or React. In this approach, you can leverage Dreamfork to handle authentication and manage data storage and retrieval for your application.
                        </p>
                        <p>
                            If this how you plan to use Dreamfork, it's recommended to explore our documentation on <a href="/docs/1.x/routing">routing</a>, <a href="/docs/1.x/tokenization">tokenization</a>, and <a href="/docs/1.x/orm">ORM mechanisms</a> for effective database management.
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
