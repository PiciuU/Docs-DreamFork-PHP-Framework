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
                        <h1>Roadmap</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#near-future-priorities">Near-Future Priorities</a>
                                <ul>
                                    <li>
                                        <a href="#session-service">Session Service</a>
                                    </li>
                                    <li>
                                        <a href="#rate-limiter">Rate Limiter</a>
                                    </li>
                                    <li>
                                        <a href="#enhanced-dependency-injector-and-application-lifecycle">Enhanced Dependency Injector and Application Lifecycle</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#long-term-vision">Long-Term Vision</a>
                                <ul>
                                    <li>
                                        <a href="#mail-service">Mail Service</a>
                                    </li>
                                    <li>
                                        <a href="#notification-service">Notification Service</a>
                                    </li>
                                    <li>
                                        <a href="#vision-template-engine">Vision Template Engine</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            The Roadmap section offers insight into the ongoing development of the Dreamfork framework. While the framework has come a long way, it is continuously evolving to become a comprehensive and feature-rich tool. Our goal is to enhance its capabilities and introduce new functionalities to meet the needs of our users.
                        </p>
                        <p>
                            This roadmap outlines the upcoming plans and priorities for the framework's development. If there's a particular feature you're looking for that isn't on the roadmap, don't worry. You can actively contribute by reaching out to us or creating an issue on the project's <a href="https://github.com/PiciuU/DreamFork-PHP-Framework">Github repository</a>. To learn more about how you can get involved, refer to the <a href="/docs/1.x/contributions">Contribution Guide</a> section. Together, we can shape the future of Dreamfork.
                        </p>
                        <h2 id="near-future-priorities">
                            <a href="#near-future-priorities">Near-Future Priorities</a>
                        </h2>
                        <h3 id="session-service">
                            <a href="#session-service">Session Service</a>
                        </h3>
                        <p>
                            In the current state, Dreamfork lacks support for session handling. Consequently, it may not be the optimal tool for web page development. Instead, its strength lies in serving as a robust backend API service.
                        </p>
                        <p>
                            To address this limitation, one of our upcoming priorities is the implementation of a Session Service. This service will introduce essential features such as cookie management and session authentication. We aim to enhance Dreamfork's capabilities and broaden its scope of applications.
                        </p>
                        <h3 id="rate-limiter">
                            <a href="#rate-limiter">Rate Limiter</a>
                        </h3>
                        <p>
                            As we recognize the significance of application throughput, we want to implement a rate limiting mechanism. This feature is designed to swiftly address the crucial issue of restricting harmful traffic targeting applications built on Dreamfork.
                        </p>
                        <p>
                            The rate limiter will play a pivotal role in protecting your applications from abuse and ensuring optimal performance. We aim to provide a seamless solution to enhance the overall security and efficiency of applications utilizing Dreamfork.
                        </p>
                        <h3 id="enhanced-dependency-injector-and-application-lifecycle">
                            <a href="#enhanced-dependency-injector-and-application-lifecycle">Enhanced Dependency Injector and Application Lifecycle</a>
                        </h3>
                        <p>
                            Acknowledging the current simplicity of the <a href="/docs/1.x/container">dependency injector</a> and <a href="/docs/1.x/lifecycle">application lifecycle</a>, we understand that as the framework expands, these components may become bottlenecks. While the existing setup fulfills its purpose, we aim to elevate and extend these aspects to better accommodate the evolving needs of the Dreamfork framework.
                        </p>
                        <p>
                            Our plan includes a comprehensive enhancement of the dependency injector and a refined approach to the application lifecycle. This improvement will not only optimize the existing functionality but also prepare the framework for future growth and scalability.
                        </p>
                        <h2 id="long-term-vision">
                            <a href="#long-term-vision">Long-Term Vision</a>
                        </h2>
                        <h3 id="mail-service">
                            <a href="#mail-service">Mail Service</a>
                        </h3>
                        <p>
                            In our long-term vision, we are dedicated to introducing a Mail Service to the Dreamfork framework. Many web applications require sending email messages to their users. While it's feasible to implement this functionality independently, we aspire to create a dedicated service that simplifies working with emails.
                        </p>
                        <p>
                            Our goal is to develop a Mail Service that provides an intuitive system, making the process of sending emails straightforward and efficient. This addition aims to enhance the overall experience for developers and streamline the integration of email functionality into Dreamfork-powered applications.
                        </p>
                        <h3 id="notification-service">
                            <a href="#notification-service">Notification Service</a>
                        </h3>
                        <p>
                            Looking ahead, we are eager to introduce a Notification Service to the Dreamfork framework. In the evolving landscape of web applications, user engagement is paramount, and active user participation enhances the overall application experience. One effective way to achieve this is through notifications.
                        </p>
                        <p>
                            Our vision is to implement a Notification Service that facilitates the straightforward delivery of web push notifications. We aim to provide developers with a seamless and intuitive solution for incorporating notification functionality into their Dreamfork-powered applications.
                        </p>
                        <h3 id="vision-template-engine">
                            <a href="#vision-template-engine">Vision Template Engine</a>
                        </h3>
                        <p>
                            In our long-term vision, we aspire to enhance and expand the capabilities of the <a href="/docs/1.x/vision">Vision template engine</a>. Currently, Vision serves as a simple template engine suitable for basic views. However, recognizing the need for more advanced features, we plan to transform Vision into a robust tool that provides a broader range of functionalities.
                        </p>
                        <p>
                            Our goal is to evolve Vision into a feature-rich template engine, offering developers a powerful and flexible solution for crafting dynamic and sophisticated views within their Dreamfork applications. As we continue to iterate on the framework, the enhanced Vision template engine will play a pivotal role in empowering developers to create expressive and engaging user interfaces.
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
