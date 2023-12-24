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
                        <h1>ORM</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#generating-model-classes">Generating Model Classes</a>
                            </li>
                            <li>
                                <a href="#orm-model-conventions">ORM Model Conventions</a>
                                <ul>
                                    <li>
                                        <a href="#table-names">Table Names</a>
                                    </li>
                                    <li>
                                        <a href="#primary-keys">Primary Keys</a>
                                    </li>
                                    <li>
                                        <a href="#timestamps">Timestamps</a>
                                    </li>
                                    <li>
                                        <a href="#default-attribute-values">Default Attribute Values</a>
                                    </li>
                                    <li>
                                        <a href="#fillable-attributes">Fillable Attributes</a>
                                    </li>
                                    <li>
                                        <a href="#hidden-visible-attributes">Hidden & Visible Attributes</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#working-with-orm-models">Working With ORM Models</a>
                                <ul>
                                    <li>
                                        <a href="#differences-between-orm-model-and-query-builder">Differences Between ORM Model And Query Builder</a>
                                    </li>
                                    <li>
                                        <a href="#retrieving-models">Retrieving Models</a>
                                    </li>
                                    <li>
                                        <a href="#retrieving-single-models">Retrieving Single Model</a>
                                    </li>
                                    <li>
                                        <a href="#inserting-new-model">Inserting New Model</a>
                                    </li>
                                    <li>
                                        <a href="#updating-existing-model">Updating Existing Model</a>
                                    </li>
                                    <li>
                                        <a href="#deleting-model">Deleting Model</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#serialization">Serialization</a>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Dreamfork includes an object-relational mapper (ORM) that enhances the experience of interacting with your database. In the realm of ORM, each database table is associated with a corresponding "Model" used for interactions. Besides retrieving records, ORM models provide capabilities for inserting, updating, and deleting records from the associated table.
                        </p>
                        <h2 id="generating-model-classes">
                            <a href="#generating-model-classes">Generating Model Classes</a>
                        </h2>
                        <p>
                            To begin, let's create an ORM model. Models are conventionally stored in the <code>App\Models</code> directory and extend the <code>Framework\Database\ORM\Model</code> class. You can generate a new model using the <code>make:model</code> dfork command:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>php dfork make:model Order</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="orm-model-conventions">
                            <a href="#orm-model-conventions">ORM Model Conventions</a>
                        </h2>
                        <p>
                            Models generated by the <code>make:model</code> command will be located in the <code>App/Models</code> directory. Let's take a look at a basic model class and discuss some key conventions within the ORM:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>namespace App\Models;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>use Framework\Database\ORM\Model;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class Order extends Model</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
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
                        <h3 id="table-names">
                            <a href="#table-names">Table Names</a>
                        </h3>
                        <p>
                            fter reviewing the example above, you might have observed that we didn't explicitly inform the ORM about the database table associated with our <code>Order</code> model. By convention, the "snake case" plural name of the class is used as the table name unless another name is explicitly specified. In this case, ORM assumes that the <code>Order</code> model stores records in the <code>orders</code> table, while an <code>OrderController</code> model would store records in an <code>order_controllers</code> table.
                        </p>
                        <p>
                            If your model's corresponding database table deviates from this convention, you can manually specify the table name by defining a <code>table</code> property on the model:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>namespace App\Models;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>use Framework\Database\ORM\Model;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class Order extends Model</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>protected $table = 'my_orders';</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="primary-keys">
                            <a href="#primary-keys">Primary Keys</a>
                        </h3>
                        <p>
                            ORM also assumes that each model's corresponding database table has a primary key column named <code>id</code>. If your database uses a different primary key column, you can define a <code>primaryKey</code> property on your model to specify the correct column:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class Order extends Model</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>protected $primaryKey = 'order_id';</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Moreover, ORM assumes that the primary key is an incrementing integer value, implying that ORM automatically casts the primary key to an integer. If you intend to use a non-incrementing or a non-numeric primary key, you must define a <code>incrementing</code> property on your model and set it to false:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class Order extends Model</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>public $incrementing = false;</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="timestamps">
                            <a href="#timestamps">Timestamps</a>
                        </h3>
                        <p>
                            By default, ORM expects <code>created_at</code> and <code>updated_at</code> columns to exist on your model's corresponding database table. ORM will automatically set these column's values when models are created or updated. If you don't want these columns to be automatically managed by ORM, you should define a <code>timestamps</code> property on your model with a value of false:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class Order extends Model</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>public $timestamps = false;</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            If you need to customize the names of the columns used to store the timestamps, you may define <code>CREATED_AT</code> and <code>UPDATED_AT</code> constants on your model:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class Order extends Model</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>const CREATED_AT = 'created_date';</span>
                                    </div>
                                    <div class="line indent">
                                        <span>const UPDATED_AT = 'updated_date';</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="default-attribute-values">
                            <a href="#default-attribute-values">Default Attribute Values</a>
                        </h3>
                        <p>
                            By default, a newly instantiated model instance will not contain any attribute values. If you wish to set default values for certain attributes, you can define an <code>attributes</code> property on your model. Attribute values placed in the <code>attributes</code> array should be in their raw, "storable" format as if they were just read from the database:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class Order extends Model</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>protected $attributes = [</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'status' => 'new'</span>
                                    </div>
                                    <div class="line indent">
                                        <span>];</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="fillable-attributes">
                            <a href="#fillable-attributes">Fillable Attributes</a>
                        </h3>
                        <p>
                            By default, a model doesn't have any defined attributes that it can edit or fill. If you plan to create new instances or update existing ones for a given model, you must explicitly define the <code>fillable</code> attributes. The convention is to specify attributes with which you intend to work.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class Order extends Model</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>protected $fillable = [</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'order_id', 'user_id', 'name', 'status'</span>
                                    </div>
                                    <div class="line indent">
                                        <span>];</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            If you want to allow editing or filling of all attributes in your model without specifying them one by one in the <code>fillable</code> array, you can use the <code>guarded</code> property and set it to false. This way, all attributes of the model will become automatically editable.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class Order extends Model</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>protected $guarded = false;</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                If you don't define fillable attributes or guarded property, operations like <code>insert</code> or <code>update</code> will not be executed due to the lack of available attributes. This situation won't trigger any exceptions in the framework, so it's crucial to ensure the proper completion of these attributes.
                            </p>
                        </blockquote>
                        <h3 id="hidden-visible-attributes">
                            <a href="#hidden-visible-attributes">Hidden & Visible Attributes</a>
                        </h3>
                        <p>
                            By default, all attributes of a model are utilized for serialization. However, there are situations where we want to hide certain attributes, such as the password attribute, which should never be sent anywhere during serialization. In such cases, we can use the <code>hidden</code> property by specifying an array of attributes to be concealed in serialization.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class Order extends Model</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>protected $hidden = [</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'credit_card_number'</span>
                                    </div>
                                    <div class="line indent">
                                        <span>];</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            If the majority of attributes in our model should not be utilized for serialization, we can use the <code>visible</code> property. By specifying the attributes in the visible array, we indicate which ones are allowed for serialization. Consequently, all other attributes not defined in <code>visible</code> will be automatically hidden.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class Order extends Model</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>protected $visible = [</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'name', 'date'</span>
                                    </div>
                                    <div class="line indent">
                                        <span>];</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="working-with-orm-models">
                            <a href="#working-with-orm-models">Working With ORM Models</a>
                        </h2>
                        <p>
                            Working with ORM models is quite similar to working with the <a href="/docs/1.x/queries">query builder</a>, as ORM essentially extends the capabilities of the builder. Therefore, using either the query builder or ORM model can yield nearly identical results. As a result, we won't reiterate every functionality, as they are already described in the previous section. Instead, we will focus on specific features dedicated to ORM models.
                        </p>
                        <h3 id="differences-between-orm-model-and-query-builder">
                            <a href="#differences-between-orm-model-and-query-builder">Differences Between ORM Model And Query Builder</a>
                        </h3>
                        <p>
                            As mentioned earlier, the results obtained using the query builder and ORM model are nearly identical, but there is an important distinction to be aware of. Consider the following example:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$resultQuery = DB::table('users')->where('id', 1')->first(); // stdClass</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$resultORM = User::where('id', 1)->first(); // User</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Code using the query builder will return an object of the <code>stdClass</code> class, whereas an ORM model will return an object of the class corresponding to the model in use.
                        </p>
                        <p>
                            In the case of retrieving not just one but multiple records from the database, the situation is similar. The Query Builder will return an object of the <code>Framework\Support\Collections\Collection</code> class, while the ORM model will return an object of the <code>Framework\Database\ORM\Collection</code> class, which is an extension of the <code>Framework\Support\Collections\Collection</code> class.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$resultQuery = DB::table('users')->get(); // Framework\Support\Collections\Collection</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$resultORM = User::get(); // Framework\Support\Collections\Collection</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="retrieving-models">
                            <a href="#retrieving-models">Retrieving Models</a>
                        </h3>
                        <p>
                            Once you have created a model and its associated database table, you are ready to start retrieving data from your database. Each ORM model serves as a powerful query builder, enabling you to fluently query the database table associated with the model. The model's all method will retrieve all records from the model's associated database table:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>foreach (User::all() as $user) {</span>
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
                        <h4 id="building-queries">
                            <a href="#building-queries">Building Queries</a>
                        </h4>
                        <p>
                            The ORM <code>all</code> method will return all the results in the model's table. However, since each ORM model functions as a query builder, you can add additional constraints to queries and then invoke the <code>get</code> method to retrieve the results:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = User::where('active', 1)->limit(10)->get();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="retrieving-single-models">
                            <a href="#retrieving-single-models">Retrieving Single Model</a>
                        </h3>
                        <p>
                            In addition to retrieving all records matching a given query, you can also fetch single records using the <code>find</code> or <code>first</code> methods. Instead of returning a collection of models, these methods provide a single model instance:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = User::find(1); // Retrieve a model by its primary key</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$user = User::where('id', 1)->first();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="inserting-new-model">
                            <a href="#inserting-new-model">Inserting New Model</a>
                        </h3>
                        <p>
                            Certainly, when using ORM, it's not just about retrieving models from the database; we also need to insert new records. Thankfully, ORM makes it simple. To insert a new record into the database, instantiate a new model instance, set attributes on the model, and then call the <code>save</code> method on the model instance:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$user = new User;</span>
                                    </div>
                                    <div class="line">
                                        <span>$user->name = 'John';</span>
                                    </div>
                                    <div class="line">
                                        <span>$user->save();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            In this example, we assign value to the name attribute of the <code>App\Models\Flight</code> model instance. When we call the <code>save</code> method, a record will be inserted into the database. The model's <code>created_at</code> and <code>updated_at</code> timestamps will automatically be set when the <coe>save</coe> method is called, eliminating the need to set them manually.
                        </p>
                        <p>
                            Alternatively, you can use the <code>create</code> method to "save" a new model using a single PHP statement. The inserted model instance will be returned to you by the <code>create</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$user = User::create([</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'name' => 'John'</span>
                                    </div>
                                    <div class="line">
                                        <span>)];</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                If you don't define fillable attributes or guarded property, operations like <code>insert</code> or <code>update</code> will not be executed due to the lack of available attributes. This situation won't trigger any exceptions in the framework, so it's crucial to ensure the proper completion of these attributes.
                            </p>
                        </blockquote>
                        <h3 id="updating-existing-model">
                            <a href="#updating-existing-model">Updating Existing Model</a>
                        </h3>
                        <p>
                            The <code>save</code> method can also be used to update models that already exist in the database. To update a model, retrieve it, set any attributes you wish to update, and then call the model's <code>save</code> method. Once again, the <code>updated_at</code> timestamp will automatically be updated, eliminating the need to manually set its value:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$user = User::find(1);</span>
                                    </div>
                                    <div class="line">
                                        <span>$user->name = 'Adam';</span>
                                    </div>
                                    <div class="line">
                                        <span>$user->save();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Updates can also be performed against models that match a given query. In this example, all users that are inactive will be marked as active:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>User::where('active', 0)->update(['active' => 1]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>update</code> method expects an array of column and value pairs representing the columns that should be updated. It returns the number of affected rows.
                        </p>
                        <h3 id="deleting-model">
                            <a href="#deleting-model">Deleting Model</a>
                        </h3>
                        <p>
                            To delete a model, you may call the <code>delete</code> method on the model instance:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$user = User::find(1);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$user->delete();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Certainly, you can construct an ORM query to delete all models matching your query's criteria. In this example, we will delete all users that are marked as inactive.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$deleted = User::where('active', 0)->delete();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="serialization">
                            <a href="#serialization">Serialization</a>
                        </h2>
                        <p>
                            To convert a model to an array, you should use the <code>toArray</code> method. This method is recursive, so all attributes will be converted to arrays:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$user = User::find(1);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>return $user->toArray();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Also the <code>attributesToArray</code> method may be used to convert a model's attributes to an array:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$user = User::find(1);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>return $user->attributesToArray();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            You can also convert entire collections of models to arrays by calling the <code>toArray</code> method on the collection instance:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$users = User::all();</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>return $users->toArray();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Since models and collections are converted to JSON when cast to a string, you can return ORM objects directly from your application's routes or controllers. Dreamfork will automatically serialize your ORM models and collections to JSON when they are returned from routes or controllers. It's worth noting that in certain situations, the automatic conversion may not work as expected. In such cases, you may need to manually use the <code>toArray</code> method to ensure proper conversion.
                        </p>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                Ensure to customize attributes that may appear in serialization using the <a href="#hidden-visible-attributes">hidden/visible</a> properties. These properties allow you to control which attributes will be included or excluded during the serialization process.
                            </p>
                        </blockquote>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
