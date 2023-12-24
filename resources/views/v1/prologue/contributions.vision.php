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
                        <h1>Contribution Guide</h1>
                        <ul>
                            <li>
                                <a href="#note-from-developer">Note From Developer</a>
                            </li>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#report-an-issue">Report An Issue</a>
                            </li>
                            <li>
                                <a href="#suggest-a-new-feature">Suggest a New Feature</a>
                            </li>
                            <li>
                                <a href="#contribute-to-dreamfork">Contribute To Dreamfork</a>
                            </li>
                        </ul>
                        <h2 id="note-from-developer">
                            <a href="#note-from-developer">Note From Developer</a>
                        </h2>
                        <p>
                            Greetings, fellow dreamforkers! Erm, I mean developers.
                        </p>
                        <p>
                            As you navigate through this documentation or will be exploring it, you'll likely notice the fact that Dreamfork is the creation of a full-stack developer who comfortably identifies as a junior. Embracing transparency, it's essential to acknowledge that my experience is still in its growth phase, and as a result, the framework may not be flawless.
                        </p>
                        <p>
                            Dreamfork is a project born out of a desire to create something functional and to breathe life into a concept. It's not perfect, and I'm okay with that. I've crafted this tool with the hope that it will serve educational purposes and be suitable for simple projects.
                        </p>
                        <p>
                            I urge you to consider using Dreamfork for learning and exploration rather than in critical business solutions. In the world of business, where a team of experienced developers is often a necessity, this junior developer's creation might not be the ideal fit.
                        </p>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Dreamfork is a project created "by developers, for developers." We believe in the power of community collaboration and welcome contributions from anyone interested in making the framework better. Whether you're a seasoned developer or just getting started, your input is valuable to us.
                        </p>
                        <p>
                            This section provides you with the information you need to contribute to Dreamfork Framework effectively. Whether you want to report a bug, suggest a new feature, or even submit code changes, we appreciate and encourage your involvement. Let's build something great together!
                        </p>
                        <h2 id="report-an-issue">
                            <a href="#report-an-issue">Report An Issue</a>
                        </h2>
                        <p>
                            If you've encountered any issues with the Dreamfork framework, we encourage you to report them by opening an issue on our <a href="https://github.com/PiciuU/DreamFork-PHP-Framework/issues">Github repository</a>. Your feedback is crucial in helping us improve the framework.
                        </p>
                        <p>
                            When reporting an issue, please provide as much detail as possible:
                        </p>
                        <div class="content-list">
                            <ul>
                                <li>
                                    <code>Description</code>: Clearly describe the issue you're facing.
                                </li>
                                <li>
                                    <code>Reproduction Steps</code>: Include steps to reproduce the problem.
                                </li>
                                <li>
                                    <code>Expected Behavior</code>: Describe what you expected to happen.
                                </li>
                                <li>
                                    <code>Actual Behavior</code>: Explain what actually occurred.
                                </li>
                                <li>
                                    <code>Environment Details</code>: Specify the framework version, PHP version, and any other relevant details.
                                </li>
                            </ul>
                        </div>
                        <p>
                            The more information you provide, the easier it is for us to identify and address the issue promptly. We appreciate your efforts in making Dreamfork better for everyone. <a href="https://github.com/PiciuU/DreamFork-PHP-Framework/issues">Click here to open a new issue</a>.
                        </p>
                        <h2 id="suggest-a-new-feature">
                            <a href="#suggest-a-new-feature">Suggest a New Feature</a>
                        </h2>
                        <p>
                            If you have a feature in mind that you'd like to see implemented in the Dreamfork framework, we welcome your suggestions! Opening a feature request on our <a href="https://github.com/PiciuU/DreamFork-PHP-Framework/issues">Github repository</a> allows you to share your ideas and contribute to the framework's growth.
                        </p>
                        <p>
                            When suggesting a new feature, provide the following details:
                        </p>
                        <div class="content-list">
                            <ul>
                                <li>
                                    <code>Feature Description</code>: Clearly describe the new functionality you're proposing.
                                </li>
                                <li>
                                    <code>Scope of Tasks</code>: Outline the tasks or requirements the feature should fulfill.
                                </li>
                                <li>
                                    <code>Use Cases</code>: Describe potential use cases or scenarios where the feature would be beneficial.
                                </li>
                                <li>
                                    <code>Dependencies</code>: Mention any existing features or components that the new feature might depend on.
                                </li>
                            </ul>
                        </div>
                        <p>
                            Your input is valuable, and we appreciate your proactive involvement in shaping the future of Dreamfork. <a href="https://github.com/PiciuU/DreamFork-PHP-Framework/issues">Click here to open a new feature request</a>.
                        </p>
                        <h2 id="contribute-to-dreamfork">
                            <a href="#contribute-to-dreamfork">Contribute To Dreamfork</a>
                        </h2>
                        <p>
                            Dreamfork is a collaborative project, and we encourage developers to actively contribute by forking the <a href="https://github.com/PiciuU/DreamFork-PHP-Framework">project on GitHub</a>. Follow these steps to create your variations and enhancements:
                        </p>
                        <p>
                            Start by forking the Dreamfork repository to your GitHub account. This creates a copy of the project under your account.
                        </p>
                        <p>
                            Clone the forked repository to your local machine.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>git clone https://github.com/your-username/dreamfork.git</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Before making changes, create a new branch for your enhancements or bug fixes.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>git checkout -b feature-or-fix-branch</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Implement your changes and ensure they align with the project's coding standards. Commit your changes with clear and concise messages.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>git commit -m "Description of changes"</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Push your changes to your forked repository.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>git push origin feature-or-fix-branch</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Create a pull request from your branch to the main Dreamfork repository. Provide a detailed description of your changes.
                        </p>
                        <p>
                            We appreciate your contributions! We'll review your pull request, and if everything aligns with the project's goals, we'll merge it into the framework.
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
