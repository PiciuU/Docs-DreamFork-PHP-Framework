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
                        <h1>Collections</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                                <ul>
                                    <li>
                                        <a href="#creating-collections">Creating Collections</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#available-methods">Available Methods</a>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            The <code>Framework\Support\Collections\Collection</code> class offers a fluent and convenient wrapper for manipulating arrays of data. Take a look at the following code for an example. Here, we use the <code>collect</code> helper to create a new collection instance from an array. We then apply the <code>filter</code> function to remove empty values from each element and finally retrieve the <code>last</code> element:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$collection = collect(['taylor', 'abigail', null])->filter()->last();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            As demonstrated, the <code>Collection</code> class enables method chaining, allowing you to fluently map and reduce the underlying array. It's important to note that collections are generally immutable. This means that each method call on a collection returns an entirely new <code>Collection</code> instance.
                        </p>
                        <h3 id="creating-collections">
                            <a href="#creating-collections">Creating Collections</a>
                        </h3>
                        <p>
                            The <code>collect</code> helper generates a new <code>Framework\Support\Collections\Collection</code> instance for the provided array. Therefore, creating a collection is straightforward:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$collection = collect([1,2,3,4,5]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                It's worth noting that the results of <a href="/docs/1.x/orm">ORM</a> queries are consistently returned as <code>Collection</code> instances.
                            </p>
                        </blockquote>
                        <h2 id="available-methods">
                            <a href="#available-methods">Available Methods</a>
                        </h2>
                        <p>
                            In the subsequent sections of the collection documentation, we will explore each method provided by the <code>Collection</code> class. Keep in mind that all these methods can be chained to seamlessly manipulate the underlying array. Additionally, it's important to note that nearly every method returns a new <code>Collection</code> instance. This feature enables you to maintain the integrity of the original collection whenever required:
                        </p>
                        <div class="list">
                            <p>
                                <a href="#method-all">all</a>
                                <a href="#method-add">add</a>
                                <a href="#method-count">count</a>
                                <a href="#method-filter">filter</a>
                                <a href="#method-first">first</a>
                                <a href="#method-get">get</a>
                                <a href="#method-implode">implode</a>
                                <a href="#method-is-empty">isEmpty</a>
                                <a href="#method-is-not-empty">isNotEmpty</a>
                                <a href="#method-keys">keys</a>
                                <a href="#method-last">last</a>
                                <a href="#method-map">map</a>
                                <a href="#method-pluck">pluck</a>
                                <a href="#method-to-array">toArray</a>
                                <a href="#method-values">values</a>
                            </p>
                        </div>
                        <h4 id="method-all">
                            <a href="#method-all">all()</a>
                        </h4>
                        <p>
                            The <code>all</code> method returns the underlying array represented by the collection.
                        </p>
                        <h4 id="method-add">
                            <a href="#method-add">add()</a>
                        </h4>
                        <p>
                            The <code>add</code> method adds specified item to the collection.
                        </p>
                        <h4 id="method-count">
                            <a href="#method-count">count()</a>
                        </h4>
                        <p>
                            The <code>count</code> method returns the total number of items in the collection.
                        </p>
                        <h4 id="method-filter">
                            <a href="#method-filter">filter()</a>
                        </h4>
                        <p>
                            The <code>filter</code> method filters the collection using the given callback, keeping only those items that pass a given truth test.
                        </p>
                        <h4 id="method-first">
                            <a href="#method-first">first()</a>
                        </h4>
                        <p>
                            The <code>first</code> method returns the first element in the collection that passes a given truth test. You may also call the <code>first</code> method with no arguments to get the first element in the collection. If the collection is empty, <code>null</code> is returned.
                        </p>
                        <h4 id="method-get">
                            <a href="#method-get">get()</a>
                        </h4>
                        <p>
                            The <code>get</code> method returns the item at a given key. If the key does not exist, null is returned. You may optionally pass a default value or callback as the second argument.
                        </p>
                        <h4 id="method-implode">
                            <a href="#method-implode">implode()</a>
                        </h4>
                        <p>
                            The <code>implode</code> method joins items in a collection. Its arguments depend on the type of items in the collection. If the collection contains arrays or objects, you should pass the key of the attributes you wish to join, and the "glue" string you wish to place between the values.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$collection = collect([['name' => 'taylor', 'age' => 18], ['name' => 'john', 'age' => 20]]);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$collection->implode('name', ', ');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="method-is-empty">
                            <a href="#method-is-empty">isEmpty()</a>
                        </h4>
                        <p>
                            The <code>isEmpty</code> method returns true if the collection is empty; otherwise, false is returned.
                        </p>
                        <h4 id="method-is-not-empty">
                            <a href="#method-is-not-empty">isNotEmpty()</a>
                        </h4>
                        <p>
                            The <code>isNotEmpty</code> method returns true if the collection is not empty; otherwise, false is returned.
                        </p>
                        <h4 id="method-keys">
                            <a href="#method-keys">keys()</a>
                        </h4>
                        <p>
                            The <code>keys</code> method returns all of the collection's keys.
                        </p>
                        <h4 id="method-last">
                            <a href="#method-last">last()</a>
                        </h4>
                        <p>
                            The <code>last</code> method returns the last element in the collection that passes a given truth test. You may also call the <code>last</code> method with no arguments to get the last element in the collection. If the collection is empty, <code>null</code> is returned.
                        </p>
                        <h4 id="method-map">
                            <a href="#method-map">map()</a>
                        </h4>
                        <p>
                            The <code>map</code> method iterates through the collection and passes each value to the given callback. The callback is free to modify the item and return it, thus forming a new collection of modified items:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$collection = collect([1,2,3]);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$newCollection = $collection->map(fn($item) => $item * 2);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="method-pluck">
                            <a href="#method-pluck">pluck()</a>
                        </h4>
                        <p>
                            The <code>pluck</code> method retrieves all of the values for a given key.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$collection = collect([['name' => 'taylor', 'age' => 18], ['name' => 'john', 'age' => 20]]);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$collection->pluck('name');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="method-to-array">
                            <a href="#method-to-array">toArray()</a>
                        </h4>
                        <p>
                            The <code>toArray</code> method converts the collection into a plain PHP array. If the collection's values are <a href="/docs/1.x/orm">ORM</a> models, the models will also be converted to arrays.
                        </p>
                        <h4 id="method-values">
                            <a href="#method-values">values()</a>
                        </h4>
                        <p>
                            The <code>values</code> method returns all the values of the collection.
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
