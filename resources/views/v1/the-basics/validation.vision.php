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
                        <h1>Validation</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#validation-quickstart">Validation Quickstart</a>
                                <ul>
                                    <li>
                                        <a href="#writing-the-validation-logic">Writing The Validation Logic</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#request-validation">Request Validation</a>
                                <ul>
                                    <li>
                                        <a href="#custom-messages">Custom Messages</a>
                                    </li>
                                    <li>
                                        <a href="#custom-attributes">Custom Attributes</a>
                                    </li>
                                    <li>
                                        <a href="#request-accesing-validated-data">Accessing Validated Data</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#manually-creating-validators">Manually Creating Validators</a>
                                <ul>
                                    <li>
                                        <a href="#manual-validation-execution">Manual Validation Execution</a>
                                    </li>
                                    <li>
                                        <a href="#accesing-validated-data">Accessing Validated Data</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#available-validation-rules">Available Validation Rules</a>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Dreamfork provides various approaches to validate your application's incoming data. While the <code>validate</code> method on HTTP requests is a common choice, Dreamfork offers flexibility with other validation methods.
                        </p>
                        <p>
                            Dreamfork's validation includes a broad range of rules, making it convenient to validate data. This section will delve into each validation rule to familiarize you with Dreamfork's validation capabilities.
                        </p>
                        <h2 id="validation-quickstart">
                            <a href="#validation-quickstart">Validation Quickstart</a>
                        </h2>
                        <p>
                            To grasp Dreamfork's validation features, let's explore a comprehensive example of validating a form and presenting error response to the user. This high-level overview will provide a solid understanding of how to validate incoming request data in Dreamfork.
                        </p>
                        <p>
                            Let's assume we have a route handling post creation and a <code>PostController</code>.
                        </p>
                        <h3 id="writing-the-validation-logic">
                            <a href="#writing-the-validation-logic">Writing The Validation Logic</a>
                        </h3>
                        <p>
                            Now, let's populate our <code>store</code> method with logic to validate the new blog post. We will utilize the <code>validate</code> method provided by the <code>Framework\Http\Request</code> object. If the validation rules pass, your code will proceed as usual. However, if validation fails, Dreamfork will throw an <code>Framework\Services\Validator\Exceptions\ValidationException</code> exception, and the appropriate error response will be automatically sent to the user.
                        </p>
                        <p>
                            To get a better understanding of the <code>validate</code> method, let's jump back into the <code>store</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>public function store(Request $request)</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$validated = $request->validate([</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'title' => 'required|string|max:255',</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'body' => 'required',</span>
                                    </div>
                                    <div class="line indent">
                                        <span>]);</span>
                                    </div>
                                    <div class="line">
                                        <span></span>
                                    </div>
                                    <div class="line indent">
                                        <span>// The blog post is valid...</span>
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
                        <p>
                            Validation Rules in Dreamfork are passed into the <code>validate</code> method. If the validation fails, the appropriate response is automatically generated. On successful validation, the controller proceeds with its normal execution.
                        </p>
                        <p>
                            Another approach is to specify validation rules as arrays instead of a single | delimited string:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$validated = $request->validate([</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'title' => ['required', 'string', 'max:255'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'body' => ['required'],</span>
                                    </div>
                                    <div class="line">
                                        <span>]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="request-validation">
                            <a href="#request-validation">Request Validation</a>
                        </h2>
                        <p>
                            As demonstrated earlier, validation can be directly performed on the <code>$request</code> object by passing a list of rules as an argument. All available rules are documented. Utilizing validation directly on the <code>$request</code> object requires the validation to succeed; otherwise, Dreamfork will automatically halt further code execution.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$validated = $request->validate([</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'title' => 'required|string|max:255',</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'body' => ['required'],</span>
                                    </div>
                                    <div class="line">
                                        <span>]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="custom-messages">
                            <a href="#custom-messages">Custom Messages</a>
                        </h3>
                        <p>
                            It is possible to define custom error messages for validation. To achieve this, pass an array of messages as the second parameter to the <code>validate</code> method.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$validated = $request->validate(</span>
                                    </div>
                                    <div class="line indent">
                                        <span>[</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'title' => ['required', 'string', 'max:255'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'body' => ['required'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>[</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'title.required' => 'You need to specify title!',</span>
                                    </div>
                                    <div class="line indent">
                                        <span>]</span>
                                    </div>
                                    <div class="line">
                                        <span>);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="custom-attributes">
                            <a href="#custom-attributes">Custom Attributes</a>
                        </h3>
                        <p>
                            It is also possible to define custom attribute names, which will be used in the error message instead of the original attribute names. To achieve this, pass an array of attribute names as the third parameter to the <code>validate</code> method.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$validated = $request->validate(</span>
                                    </div>
                                    <div class="line indent">
                                        <span>[</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'title' => ['required', 'string', 'max:255'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'body' => ['required'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>[</span>
                                    </div>
                                    <div class="line indent">
                                        <span>],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>[</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'title' => 'post title',</span>
                                    </div>
                                    <div class="line indent">
                                        <span>]</span>
                                    </div>
                                    <div class="line">
                                        <span>);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="request-accesing-validated-data">
                            <a href="#request-accesing-validated-data">Accessing Validated Data</a>
                        </h3>
                        <p>
                            The <code>validate</code> method returns an array, allowing you to access the validated data using keys, for example:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$validated = $request->validate(</span>
                                    </div>
                                    <div class="line indent">
                                        <span>[</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'title' => ['required', 'string', 'max:255'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'body' => ['required'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>]</span>
                                    </div>
                                    <div class="line">
                                        <span>);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>echo $validated['title'];</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="manually-creating-validators">
                            <a href="#manually-creating-validators">Manually Creating Validators</a>
                        </h2>
                        <p>
                            If you prefer not to use the <code>validate</code> method on a request, you can create a validator instance using the <code>Validator</code> <a href="/docs/1.x/facades">facade</a>. The <code>make</code> method on the facade generates a new validator instance. The first argument passed to <code>make</code> is the data to be validated, followed by the validation rules as subsequent arguments, similar to the <code>validate</code> method.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Validator;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$validator = Validator::make($request->all(), [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'title' => ['required', 'string', 'max:255'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'body' => ['required'],</span>
                                    </div>
                                    <div class="line">
                                        <span>]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            In the case of such a validator, validation is not performed automatically, and you need to explicitly execute it.
                        </p>
                        <h3 id="manual-validation-execution">
                            <a href="#manual-validation-execution">Manual Validation Execution</a>
                        </h3>
                        <p>
                            When manually executing validation using the <code>Validator</code> facade in Dreamfork, the process involves checking whether the validation failed. This approach provides the advantage of allowing you to handle validation failures according to your specific requirements, instead of automatically generating a response as seen with the <code>validate</code> method on the request:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Validator;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$validator = Validator::make($request->all(), [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'title' => ['required', 'string', 'max:255'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'body' => ['required'],</span>
                                    </div>
                                    <div class="line">
                                        <span>]);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>if ($validator->fails()) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$errors = $validator->getMessages();</span>
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
                        <p>
                            If you do not need to handle validation failures in a custom way, you can use the <code>throw</code> method. This method allows you to achieve the same effect as when validation fails with the <code>validate</code> method on the request - the code execution will be halted, and a response with details of the validation failure will be generated.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Validator;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$validator = Validator::make($request->all(), [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'title' => ['required', 'string', 'max:255'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'body' => ['required'],</span>
                                    </div>
                                    <div class="line">
                                        <span>]);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>if ($validator->fails()) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$validator->throw();</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="accesing-validated-data">
                            <a href="#accesing-validated-data">Accessing Validated Data</a>
                        </h3>
                        <p>
                            After handling potential validation failures, you can access the validated data using the <code>safe()</code> method in Dreamfork. This method allows you to retrieve specific attributes by using <code>only()</code> or exclude certain attributes using <code>except()</code>.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                <div class="line">
                                        <span>// Access validated data using safe()</span>
                                    </div>
                                    <div class="line">
                                        <span>$title = $validator->safe()->title;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>// Access validated data using safe()->only()</span>
                                    </div>
                                    <div class="line">
                                        <span>$title = $validator->safe()->only(['author', 'title'])['title'];</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>// Access validated data using safe()->except()</span>
                                    </div>
                                    <div class="line">
                                        <span>$author = $validator->safe()->except(['title'])['author'];</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            You can also access all validated attributes using the <code>validated()</code> method in Dreamfork.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$validated = $validator->validated();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="available-validation-rules">
                            <a href="#available-validation-rules">Available Validation Rules</a>
                        </h2>
                        <p>
                            Below is a list of all available validation rules and their function:
                        </p>
                        <div class="list">
                            <p>
                                <a href="#rule-array">Array</a>
                                <a href="#rule-boolean">Boolean</a>
                                <a href="#rule-confirmed">Confirmed</a>
                                <a href="#rule-decimal">Decimal</a>
                                <a href="#rule-email">Email</a>
                                <a href="#rule-ends-with">Ends With</a>
                                <a href="#rule-file">File</a>
                                <a href="#rule-gt">Greater Than</a>
                                <a href="#rule-gte">Greater Than Or Equal</a>
                                <a href="#rule-in">In</a>
                                <a href="#rule-integer">Integer</a>
                                <a href="#rule-ip">IP Address</a>
                                <a href="#rule-lowercase">Lowercase</a>
                                <a href="#rule-lt">Less Than</a>
                                <a href="#rule-lte">Less Than Or Equal</a>
                                <a href="#rule-max">Max</a>
                                <a href="#rule-min">Min</a>
                                <a href="#rule-not-in">Not In</a>
                                <a href="#rule-not_regex">Not Regex</a>
                                <a href="#rule-nullable">Nullable</a>
                                <a href="#rule-numeric">Numeric</a>
                                <a href="#rule-regex">Regex</a>
                                <a href="#rule-required">Required</a>
                                <a href="#rule-same">Same</a>
                                <a href="#rule-size">Size</a>
                                <a href="#rule-starts-with">Starts With</a>
                                <a href="#rule-sometimes">Sometimes</a>
                                <a href="#rule-string">String</a>
                                <a href="#rule-uppercase">Uppercase</a>
                            </p>
                        </div>
                        <h4 id="rule-array">
                            <a href="#rule-array">array</a>
                        </h4>
                        <p>
                            The field under validation must be a PHP <code>array</code>.
                        </p>
                        <p>
                            When using the <code>array</code> rule, you can provide additional values that serve as a whitelist. Each key in the input array must be present within the list of values provided to the rule. Here's an example to illustrate this:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$input = [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'post' => [</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'title' => 'Some title',</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'body' => 'Content of post',</span>
                                    </div>
                                    <div class="line indent">
                                        <span>],</span>
                                    </div>
                                    <div class="line">
                                        <span>];</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$validator = Validator::make($input, [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'post' => 'array:title',</span>
                                    </div>
                                    <div class="line">
                                        <span>]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            In this example, the <code>body</code> key was defined within the array rule, but it was not supplied to the validator. It's crucial to note that if any keys are omitted from the <code>array</code> rule, the validation will fail. Therefore, it is mandatory to explicitly specify all the array keys that are expected during validation to ensure a successful validation process.
                        </p>
                        <h4 id="rule-boolean">
                            <a href="#rule-boolean">boolean</a>
                        </h4>
                        <p>
                            The field under validation must be able to be cast as a boolean. Accepted input are <code>true</code>, <code>false</code>, <code>1</code>, <code>0</code>, <code>"1"</code>, and <code>"0"</code>.
                        </p>
                        <h4 id="rule-confirmed">
                            <a href="#rule-confirmed">confirmed</a>
                        </h4>
                        <p>
                            The field under validation must have a matching field of <code>{field}_confirmation</code>. For example, if the field under validation is <code>password</code>, a matching <code>password_confirmation</code> field must be present in the input.
                        </p>
                        <h4 id="rule-decimal">
                            <a href="#rule-decimal">decimal:min,max</a>
                        </h4>
                        <p>
                            The field under validation must be numeric and must contain the specified number of decimal places:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>// Must have exactly two decimal places (9.99)...</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'price' => 'decimal:2'</span>
                                    </div>
                                    <div class="line">
                                        <span>// Must have between 2 and 4 decimal places...</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'price' => 'decimal:2,4'</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="rule-email">
                            <a href="#rule-email">email</a>
                        </h4>
                        <p>
                            The field under validation must be formatted as an email address.
                        </p>
                        <h4 id="rule-ends-with">
                            <a href="#rule-ends-with">ends_with:foo,bar,...</a>
                        </h4>
                        <p>
                            The field under validation must end with one of the given values.
                        </p>
                        <h4 id="rule-file">
                            <a href="#rule-file">file</a>
                        </h4>
                        <p>
                            The field under validation must be a successfully uploaded file.
                        </p>
                        <h4 id="rule-gt">
                            <a href="#rule-gt">gt:field</a>
                        </h4>
                        <p>
                            The field under validation must be greater than the given field or value. The two fields must be of the same type.
                        </p>
                        <h4 id="rule-gte">
                            <a href="#rule-gte">gte:field</a>
                        </h4>
                        <p>
                            The field under validation must be greater than or equal to the given field or value. The two fields must be of the same type.
                        </p>
                        <h4 id="rule-in">
                            <a href="#rule-in">in:foo,bar,...</a>
                        </h4>
                        <p>
                            The field under validation must be included in the given list of values. Since this rule often requires you to <code>implode</code> an array, the <code>Rule::in</code> method may be used to fluently construct the rule:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Services\Validator\Rule;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$validator = Validator::make($request->all(), [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'title' => ['required', 'string', 'max:255'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'category' => ['required', Rule::in(['it', 'educational'])],</span>
                                    </div>
                                    <div class="line">
                                        <span>]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="rule-integer">
                            <a href="#rule-integer">integer</a>
                        </h4>
                        <p>
                            The field under validation must be an integer.
                        </p>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                This validation rule does not specifically check whether the input is of the "integer" variable type. Instead, it verifies that the input conforms to the type accepted by PHP's <code>FILTER_VALIDATE_INT</code> rule. If you need to validate the input as a number, it is recommended to use this rule in conjunction with <a href="#rule-numeric">the numeric validation rule</a>.
                            </p>
                        </blockquote>
                        <h4 id="rule-ip">
                            <a href="#rule-ip">ip</a>
                        </h4>
                        <p>
                            The field under validation must be an IP address.
                        </p>
                        <h4 id="rule-lowercase">
                            <a href="#rule-lowercase">lowercase</a>
                        </h4>
                        <p>
                            The field under validation must be lowercase.
                        </p>
                        <h4 id="rule-lt">
                            <a href="#rule-lt">lt:field</a>
                        </h4>
                        <p>
                            The field under validation must be less than the given field or value. The two fields must be of the same type.
                        </p>
                        <h4 id="rule-lte">
                            <a href="#rule-lte">lte:field</a>
                        </h4>
                        <p>
                            The field under validation must be less than or equal to the given field or value. The two fields must be of the same type.
                        </p>
                        <h4 id="rule-max">
                            <a href="#rule-max">max:value</a>
                        </h4>
                        <p>
                            The field under validation must be less than or equal to a maximum value.
                        </p>
                        <h4 id="rule-min">
                            <a href="#rule-min">min:value</a>
                        </h4>
                        <p>
                            The field under validation must have a minimum value.
                        </p>
                        <h4 id="rule-not-in">
                            <a href="#rule-not-in">not_in:foo,bar,...</a>
                        </h4>
                        <p>
                            The field under validation must not be included in the given list of values. The <code>Rule::notIn</code> method may be used to fluently construct the rule:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Services\Validator\Rule;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$validator = Validator::make($request->all(), [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'title' => ['required', 'string', 'max:255'],</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'category' => ['required', Rule::notIn(['lifestyle', 'cooking'])],</span>
                                    </div>
                                    <div class="line">
                                        <span>]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="rule-not-regex">
                            <a href="#rule-not-regex">not_regex:pattern</a>
                        </h4>
                        <p>
                            The field under validation must not match the given regular expression.
                        </p>
                        <p>
                            Internally, this rule uses the PHP <code>preg_match</code> function. The pattern specified should obey the same formatting required by <code>preg_match</code> and thus also include valid delimiters. For example: <code>'email' => 'not_regex:/^.+$/i'</code>.
                        </p>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                When using the <code>regex</code> / <code>not_regex</code> patterns, it may be necessary to specify your validation rules using an array instead of using | delimiters, especially if the regular expression contains a | character.
                            </p>
                        </blockquote>
                        <h4 id="rule-nullable">
                            <a href="#rule-nullable">nullable</a>
                        </h4>
                        <p>
                            The field under validation may be <code>null</code>.
                        </p>
                        <h4 id="rule-numeric">
                            <a href="#rule-numeric">numeric</a>
                        </h4>
                        <p>
                            The field under validation must be <a href="https://www.php.net/manual/en/function.is-numeric.php">numeric</a>.
                        </p>
                        <h4 id="rule-regex">
                            <a href="#rule-regex">regex:pattern</a>
                        </h4>
                        <p>
                            The field under validation must match the given regular expression.
                        </p>
                        <p>
                            Internally, this rule uses the PHP <code>preg_match</code> function. The pattern specified should obey the same formatting required by <code>preg_match</code> and thus also include valid delimiters. For example: <code>'email' => 'not_regex:/^.+$/i'</code>.
                        </p>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                When using the <code>regex</code> / <code>not_regex</code> patterns, it may be necessary to specify your validation rules using an array instead of using | delimiters, especially if the regular expression contains a | character.
                            </p>
                        </blockquote>
                        <h4 id="rule-required">
                            <a href="#rule-required">required</a>
                        </h4>
                        <p>
                            The field under validation must be present in the input data and not empty. A field is "empty" if it meets one of the following criteria:
                        </p>
                        <ul class="content-list">
                            <li>The value is null.</li>
                            <li>The value is an empty string.</li>
                            <li>The value is an empty array or empty <code>Countable</code> object.</li>
                            <li>The value is an uploaded file with no path.</li>
                        </ul>
                        <h4 id="rule-same">
                            <a href="#rule-same">same</a>
                        </h4>
                        <p>
                            The given field must match the field under validation.
                        </p>
                        <h4 id="rule-size">
                            <a href="#rule-size">size:value</a>
                        </h4>
                        <p>
                            The field under validation must have a size matching the given value. For string data, value corresponds to the number of characters. For numeric data, value corresponds to a given integer value (the attribute must also have the <code>numeric</code> or <code>integer</code> rule). For an array, size corresponds to the <code>count</code> of the array. For files, size corresponds to the file size in kilobytes. Let's look at some examples:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>// Validate that a string is exactly 12 characters long...</span>
                                    </div>
                                    <div class="line">
                                        <span>'title' => 'size:12';</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>// Validate that a provided integer equals 10...</span>
                                    </div>
                                    <div class="line">
                                        <span>'seats' => 'integer|size:10';</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>// Validate that an array has exactly 5 elements...</span>
                                    </div>
                                    <div class="line">
                                        <span>'tags' => 'array|size:5';</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>// Validate that an uploaded file is exactly 512 kilobytes...</span>
                                    </div>
                                    <div class="line">
                                        <span>'image' => 'file|size:512';</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="rule-starts-with">
                            <a href="#rule-starts-with">starts_with:foo,bar,...</a>
                        </h4>
                        <p>
                            The field under validation must start with one of the given values.
                        </p>
                        <h4 id="rule-sometimes">
                            <a href="#rule-sometimes">sometimes</a>
                        </h4>
                        <p>
                            In some situations, you may wish to run validation checks against a field only if that field is present in the data being validated. To quickly accomplish this, use this rule.
                        </p>
                        <h4 id="rule-string">
                            <a href="#rule-string">string</a>
                        </h4>
                        <p>
                            The field under validation must be a string. If you would like to allow the field to also be <code>null</code>, you should assign the <code>nullable</code> rule to the field.
                        </p>
                        <h4 id="rule-uppercase">
                            <a href="#rule-uppercase">uppercase</a>
                        </h4>
                        <p>
                            The field under validation must be uppercase.
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
