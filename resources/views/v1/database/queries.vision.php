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
                        <h1>Database Query Builder</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#configuration">Configuration</a>
                            </li>
                            <li>
                                <a href="#running-sql-queries">Running SQL Queries</a>
                                <ul>
                                    <li>
                                        <a href="#running-select-query">Running A Select Query</a>
                                    </li>
                                    <li>
                                        <a href="#running-insert-statement">Running An Insert Statement</a>
                                    </li>
                                    <li>
                                        <a href="#running-update-statement">Running An Update Statement</a>
                                    </li>
                                    <li>
                                        <a href="#running-delete-statement">Running A Delete Statement</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#running-database-queries">Running Database Queries</a>
                                <ul>
                                    <li>
                                        <a href="#retrieving-all-rows-from-table">Retrieving All Rows From A Table</a>
                                    </li>
                                    <li>
                                        <a href="#retrieving-single-row-column-from-table">Retrieving A Single Row / Column From A Table</a>
                                    </li>
                                    <li>
                                        <a href="#aggregates">Aggregates</a>
                                    </li>
                                    <li>
                                        <a href="#determining-if-records-exist">Determining If Records Exist</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#select-statements">Select Statements</a>
                            </li>
                            <li>
                                <a href="#raw-expressions">Raw Expressions</a>
                                <ul>
                                    <li>
                                        <a href="#raw-methods">Raw Methods</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#joins">Joins</a>
                                <ul>
                                    <li>
                                        <a href="#inner-join-clause">Inner Join Clause</a>
                                    </li>
                                    <li>
                                        <a href="#left-right-join-clause">Left Join / Right Join Clause</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#unions">Unions</a>
                            </li>
                            <li>
                                <a href="#basic-where-clauses">Basic Where Clauses</a>
                                <ul>
                                    <li>
                                        <a href="#where-clauses">Where Clauses</a>
                                    </li>
                                    <li>
                                        <a href="#or-where-clauses">Or Where Clauses</a>
                                    </li>
                                    <li>
                                        <a href="#where-not-clauses">Where Not Clauses</a>
                                    </li>
                                    <li>
                                        <a href="#where-in-clauses">Where In Clauses</a>
                                    </li>
                                    <li>
                                        <a href="#where-null-clauses">Where Null Clauses</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#ordering-grouping-limit-offset">Ordering, Grouping, Limit & Offset</a>
                                <ul>
                                    <li>
                                        <a href="#ordering">Ordering</a>
                                    </li>
                                    <li>
                                        <a href="#grouping">Grouping</a>
                                    </li>
                                    <li>
                                        <a href="#limit-offset">Limit & Offset</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#insert-statements">Insert Statements</a>
                                <ul>
                                    <li>
                                        <a href="#retrieving-the-last-inserted-id">Retrieving the Last Inserted ID</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#update-statements">Update Statements</a>
                            </li>
                            <li>
                                <a href="#delete-statements">Delete Statements</a>
                            </li>
                            <li>
                                <a href="#debugging">Debugging</a>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Dreamfork currently supports MySQL as its primary database system. Dreamfork simplifies and secures database interactions by supporting raw SQL statements, query builders, and <a href="/docs/1.x/orm">ORM</a>.
                        </p>
                        <h2 id="configuration">
                            <a href="#configuration">Configuration</a>
                        </h2>
                        <p>
                            Dreamfork's database settings are located in <code>/config/database.php</code>. Default connection data, like host and username, are in the <code>.env</code> file. Adjust them there to match your database needs. For more tweaks, refer to <code>/config/database.php</code>. Dreamfork simplifies configuration for efficient, tailored performance.
                        </p>
                        <h2 id="running-sql-queries">
                            <a href="#running-sql-queries">Running SQL Queries</a>
                        </h2>
                        <p>
                            After configuring your database connection, you can execute queries using the <code>DB</code> facade. This facade offers dedicated methods for various query types, including <code>select</code>, <code>insert</code>, <code>update</code> and <code>delete</code>.
                        </p>
                        <h3 id="running-select-query">
                            <a href="#running-select-query">Running A Select Query</a>
                        </h3>
                        <p>
                            To run a basic SELECT query, you may use the <code>select</code> method on the <code>DB</code> facade:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line ">
                                        <span>use Framework\Support\Facades\DB;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$users = DB::select('select * from users where id = ?', [1]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            In the <code>select</code> method, the first argument represents the SQL query, and the second argument includes any parameter bindings essential for the query. Usually, these bindings correspond to the values of the <code>where</code> clause constraints. This approach of parameter binding ensures security against SQL injection.
                        </p>
                        <p>
                            The <code>select</code> method consistently returns an <code>array</code> of results. Each result in the array is represented by a PHP <code>stdClass</code> object, depicting a record from the database:
                        </p>
                        <h4 id="using-named-bindings">
                            <a href="#using-named-bindings">Using Named Bindings</a>
                        </h4>
                        <p>
                            Rather than using <code>?</code>, you have the option to execute a query using named bindings for your parameter values:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::select('select * from users where id = :id', ['id' => 1]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="running-insert-statement">
                            <a href="#running-insert-statement">Running An Insert Statement</a>
                        </h3>
                        <p>
                            To execute an <code>insert</code> statement, utilize the insert method on the <code>DB</code> facade. Similar to the <code>select</code> method, the insert method takes the SQL query as its first argument and bindings as its second argument:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>DB::insert('insert into users (name, email) values (?, ?)', ['John', 'john@mail.com']);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="running-update-statement">
                            <a href="#running-update-statement">Running An Update Statement</a>
                        </h3>
                        <p>
                            For updating existing records in the database, employ the <code>update</code> method. This method not only updates records but also returns the count of rows affected by the statement:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>DB::update('update users set active = 1 where id = ?', [1]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="running-delete-statement">
                            <a href="#running-delete-statement">Running A Delete Statement</a>
                        </h3>
                        <p>
                            To delete records from the database, utilize the <code>delete</code> method. Similar to the <code>update</code> method, the delete method returns the count of rows affected by the operation:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>DB::delete('delete from users where id = ?', [1]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="running-database-queries">
                            <a href="#running-database-queries">Running Database Queries</a>
                        </h2>
                        <h3 id="retrieving-all-rows-from-table">
                            <a href="#retrieving-all-rows-from-table">Retrieving All Rows From A Table</a>
                        </h3>
                        <p>
                            Initiate a query by utilizing the <code>table</code> method offered by the <code>DB</code> facade. The <code>table</code> method yields a fluent query builder instance specific to the provided table. This enables you to sequentially apply additional constraints to the query. Ultimately, retrieve the query results using the <code>get</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>get</code> method returns a <code>Collection</code> instance from the <code>Framework\Support\Collections</code> namespace, containing the query results. Each result in the collection is represented as a PHP <code>stdClass</code> object. Access each column's value by treating the column as a property of the object:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->get();</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>foreach ($users as $user) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>echo $user->name;</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="retrieving-single-row-column-from-table">
                            <a href="#retrieving-single-row-column-from-table">Retrieving A Single Row / Column From A Table</a>
                        </h3>
                        <p>
                            To fetch a single row from a database table, employ the <code>DB</code> facade's <code>first</code> method. This method returns a single stdClass object:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$user = DB::table('users')->where('id', 1)->first();</span>
                                    </div>
                                    <div class="line">
                                        <span>return $user->name;</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            If you only require a specific value from a record, utilize the <code>value</code> method. This method directly returns the value of the specified column:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$name = DB::table('users')->where('id', 1)->value('name');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                         For retrieving a single row based on the <code>id</code> column value, use the <code>find</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$user = DB::table('users')->find(1);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="aggregates">
                            <a href="#aggregates">Aggregates</a>
                        </h3>
                        <p>
                            The query builder in Dreamfork offers various methods for retrieving aggregate values such as <code>count</code>, <code>max</code>, <code>min</code>, <code>avg</code> and <code>sum</code>. You can invoke any of these methods after constructing your query:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->count();</span>
                                    </div>
                                    <div class="line">
                                        <span>$price = DB::table('orders')->max('price');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Combine these methods with other clauses to precisely define how your aggregate value is calculated:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->where('active', 1)->count();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="determining-if-records-exist">
                            <a href="#determining-if-records-exist">Determining If Records Exist</a>
                        </h3>
                        <p>
                            To determine if any records exist that match your query's constraints, you can use the <code>exists</code> and <code>doesntExist</code> methods:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>if ($users = DB::table('users')->where('id', 1)->exists()) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// ...</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>if ($users = DB::table('users')->where('id', 1)->doesntExist()) {</span>
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
                        <h2 id="select-statements">
                            <a href="#select-statements">Select Statements</a>
                        </h2>
                        <p>
                            In Dreamfork, you can customize the "select" clause for a query using the <code>select</code> method, allowing you to choose specific columns from a database table:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->select('name', 'email as user_email')->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            To obtain distinct results, use the <code>distinct</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->distinct()->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            If you already have a query builder instance and want to add a column to its existing select clause, use the <code>addSelect</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$query = DB::table('users')->select('name');</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$users = $query->addSelect('email')->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="raw-expressions">
                            <a href="#raw-expressions">Raw Expressions</a>
                        </h2>
                        <p>
                            When you need to insert an arbitrary string into a query, you can create a raw string expression using the <code>raw</code> method provided by the <code>DB</code> facade:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->select(DB::raw('count(*) as user_count, active'))->groupBy('active')->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                Be cautious when using raw statements, as they are injected into the query as strings. To avoid creating SQL injection vulnerabilities, exercise extreme care.
                            </p>
                        </blockquote>
                        <h3 id="raw-methods">
                            <a href="#raw-methods">Raw Methods</a>
                        </h3>
                        <p>
                            In Dreamfork, you have alternative methods to insert raw expressions into different parts of your query. Keep in mind that while these methods provide flexibility, Dreamfork cannot guarantee protection against SQL injection vulnerabilities.
                        </p>
                        <h4 id="selectraw">
                            <a href="#selectraw">selectRaw</a>
                        </h4>
                        <p>
                            The <code>selectRaw</code> method can be used in place of select(DB::raw(/* ... */)). This method accepts an optional array of bindings as its second argument:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$orders = DB::table('orders')->selectRaw('price * ? as price_with_tax', [1.23])->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="whereraw-orwhereraw">
                            <a href="#whereraw-orwhereraw">whereRaw / orWhereRaw</a>
                        </h4>
                        <p>
                            The <code>whereRaw</code> and <code>orWhereRaw</code> method can be used to inject a raw "where" clause into your query. These methods accept an optional array of bindings as their second argument:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$orders = DB::table('orders')->whereRaw('price > ?', [150])->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="havingraw-orhavingraw">
                            <a href="#havingraw-orhavingraw">havingRaw / orHavingRaw</a>
                        </h4>
                        <p>
                            The <code>havingRaw</code> and <code>orHavingRaw</code> method may be used to provide a raw string as the value of the "having" clause. These methods accept an optional array of bindings as their second argument:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$orders = DB::table('orders')->select('client_id', DB::raw('SUM(price) as total_sales'))</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>->groupBy('client_id')->havingRaw('SUM(price) > ?', [1000])->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="orderbyraw">
                            <a href="#orderbyraw">orderByRaw</a>
                        </h4>
                        <p>
                            The <code>orderByRaw</code> method may be used to provide a raw string as the value of the "order by" clause:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$orders = DB::table('orders')->orderByRaw('updated_at - created_at DESC')->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="groupbyraw">
                            <a href="#groupbyraw">groupbyRaw</a>
                        </h4>
                        <p>
                            The <code>groupbyRaw</code> method may be used to provide a raw string as the value of the group by clause:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$orders = DB::table('orders')->select('city', 'state')->groupByRaw('city, state')->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="joins">
                            <a href="#joins">Joins</a>
                        </h2>
                        <h3 id="inner-join-clause">
                            <a href="#inner-join-clause">Inner Join Clause</a>
                        </h3>
                        <p>
                            The query builder allows you to incorporate join clauses into your queries. For a basic "inner join," utilize the join method on a query builder instance. The first argument for the <code>join</code> method is the name of the table you want to join, followed by the column constraints for the join. You can join multiple tables within a single query:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')</span>
                                    </div>
                                    <div class="line indent">
                                        <span>->join('contacts', 'users.id', '=', 'contacts.user_id')</span>
                                    </div>
                                    <div class="line indent">
                                        <span>->join('orders', 'users.id', '=', 'orders.user_id')</span>
                                    </div>
                                    <div class="line indent">
                                        <span>->select('users.*', 'contacts.phone', 'orders.price')</span>
                                    </div>
                                    <div class="line indent">
                                        <span>->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="left-right-join-clause">
                            <a href="#left-right-join-clause">Left Join / Right Join Clause</a>
                        </h3>
                        <p>
                            For a "left join" or "right join" instead of an "inner join," leverage the <code>leftJoin</code> or <code>rightJoin</code> methods, maintaining the same signature as the join method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->leftJoin('posts', 'users.id', '=', 'posts.user_id')->get();</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$users = DB::table('users')->rightJoin('posts', 'users.id', '=', 'posts.user_id')->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="unions">
                            <a href="#unions">Unions</a>
                        </h2>
                        <p>
                            The query builder also offers a convenient method to "union" two or more queries together. To illustrate, you can create an initial query and use the <code>union</code> method to combine it with additional queries:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$first = DB::table('users')->whereNull('first_name');</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$users = DB::table('users')->whereNull('last_name')->union($first)->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            In addition to the <code>union</code> method, the query builder provides a <code>unionAll</code> method. When using <code>unionAll</code>, duplicate results from combined queries are not removed. The <code>unionAll</code> method has the same method signature as the <code>union</code> method.
                        </p>
                        <h2 id="basic-where-clauses">
                            <a href="#basic-where-clauses">Basic Where Clauses</a>
                        </h2>
                        <h3 id="where-clauses">
                            <a href="#where-clauses">Where Clauses</a>
                        </h3>
                        <p>
                            In Dreamfork's query builder, use the <code>where</code> method to add "where" clauses to your query. The most basic call to the <code>where</code> method involves three arguments: the column name, an operator, and the value for comparison.
                        </p>
                        <p>
                            For instance, the following query retrieves users where the id column is greater than 5, and the age column is equal 20:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->where('id', '>', 5)->where('age', '=', 20)->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            For convenience, if you want to verify that a column is equal to a given value, pass the value as the second argument, and Dreamfork will assume the use of the = operator:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->where('age', 20)->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            You can use any operator supported by your database system:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->where('name', 'like', 'John')->where('age', '<>', 20)->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                PDO does not support binding column names. Therefore, you should never allow user input to dictate the column names referenced by your queries, including "order by" columns.
                            </p>
                        </blockquote>
                        <h3 id="or-where-clauses">
                            <a href="#or-where-clauses">Or Where Clauses</a>
                        </h3>
                        <p>
                            When chaining calls to the query builder's <code>where</code> method, the "where" clauses are joined using the <code>AND</code> operator. However, you can utilize the <code>orWhere</code> method to append a clause to the query using the <code>OR</code> operator. The orWhere method accepts the same arguments as the <code>where</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->where('name', 'like', 'John')->orWhere('name', 'like', 'Tom')->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="where-not-clauses">
                            <a href="#where-not-clauses">Where Not Clauses</a>
                        </h3>
                        <p>
                            The <code>whereNot</code> and <code>orWhereNot</code> methods can be used to negate a specific constraint.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->whereNot('id', 1)->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="where-in-clauses">
                            <a href="#where-in-clauses">Where In Clauses</a>
                        </h3>
                        <p>
                            The <code>whereIn</code> and <code>whereNotIn</code> methods check whether a given column's value is contained or not within the provided array:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->whereIn('id', [1,2,3])->get();</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$users = DB::table('users')->whereNotIn('id', [1,2,3])->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="where-null-clauses">
                            <a href="#where-null-clauses">Where Null Clauses</a>
                        </h3>
                        <p>
                            The <code>whereNull</code> and <code>whereNotNull</code> methods validate whether the value of the specified column is NULL or NOT NULL:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->whereNull('updated_at')->get();</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$users = DB::table('users')->whereNotIn('email')->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="ordering-grouping-limit-offset">
                            <a href="#ordering-grouping-limit-offset">Ordering, Grouping, Limit & Offset</a>
                        </h2>
                        <h3 id="ordering">
                            <a href="#ordering">Ordering</a>
                        </h3>
                        <p>
                            The <code>orderBy</code> method enables you to sort the query results based on a specified column. The first argument for the <code>orderBy</code> method should be the column for sorting, and the second argument defines the sort direction, which can be either asc or desc:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->orderBy('name', 'desc)->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            For sorting by multiple columns, you can use the <code>orderBy</code> method multiple times:
                        </p>
                        <h4 id="latest-oldest">
                            <a href="#latest-oldest">The Latest & Oldest Methods</a>
                        </h4>
                        <p>
                            The <code>latest</code> and <code>oldest</code> methods simplify ordering results by date. By default, the result is ordered by the table's <code>created_at</code> column. Alternatively, you can specify the column name for sorting:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->latest()->first();</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$users = DB::table('users')->oldest()->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        </p>
                        <h4 id="random-ordering">
                            <a href="#random-ordering">Random Ordering</a>
                        </h4>
                        <p>
                            For random ordering, use the inRandomOrder method. For instance, to retrieve a random user:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->inRandomOrder()->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="grouping">
                            <a href="#grouping">Grouping</a>
                        </h3>
                        <p>
                            As anticipated, the <code>groupBy</code> and <code>having</code> methods are employed to group the query results. The <code>having</code> method shares a signature similar to that of the <code>where</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->groupBy('role_id')->having('role_id', '>', 1)->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            You may pass multiple arguments to the <code>groupBy</code> method to group by multiple columns:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->groupBy('first_name', 'status')->having('role_id', '>', 1)->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="limit-offset">
                            <a href="#limit-offset">Limit & Offset</a>
                        </h3>
                        <p>
                            You may use the <code>limit</code> and <code>offset</code> methods to limit the number of results returned from the query or to skip a given number of results in the query:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = DB::table('users')->offset(10)->limit(5)->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="insert-statements">
                            <a href="#insert-statements">Insert Statements</a>
                        </h2>
                        <p>
                            The query builder offers an <code>insert</code> method for inserting records into a database table. The <code>insert</code> method takes an array of column names and corresponding values:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>DB::table('users')->insert(['name' => 'Terry', 'email' => 'terry@example.com']);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="retrieving-the-last-inserted-id">
                            <a href="#retrieving-the-last-inserted-id">Retrieving the Last Inserted ID</a>
                        </h3>
                        <p>
                            You can utilize the <code>getLastInsertId</code> method on the DB facade to retrieve the ID of the last record inserted into the database.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>DB::table('users')->insert(['name' => 'Terry', 'email' => 'terry@example.com']);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$id = DB::getLastInsertId();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="update-statements">
                            <a href="#update-statements">Update Statements</a>
                        </h2>
                        <p>
                            In addition to inserting records into the database, the query builder can update existing records using the <code>update</code> method. Similar to the insert method, the <code>update</code> method takes an array of column and value pairs, specifying the columns to be updated. The <code>update</code> method returns the number of affected rows. You can apply constraints to the update query using where clauses:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$affected = DB::table('users')->where('id', 1)->update(['age' => 21]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="delete-statements">
                            <a href="#delete-statements">Delete Statements</a>
                        </h2>
                        <p>
                            The <code>delete</code> method in the query builder is employed to delete records from the table. This method returns the number of affected rows. You can impose constraints on delete statements by adding "where" clauses before invoking the <code>delete</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$deleted = DB::table('users')->where('age', '<', 18)->delete();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="debugging">
                            <a href="#debugging">Debugging</a>
                        </h2>
                        <p>
                            If you find yourself uncertain about how your SQL statement is being executed or if it has been composed correctly, you can utilize the <code>debug</code> method for insights. This method will display information about the prepared statement, its bindings, and the resulting raw statement after binding:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>DB::table('users')->select('name')->where('id','<>','1')->latest()->debug();</span>
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
