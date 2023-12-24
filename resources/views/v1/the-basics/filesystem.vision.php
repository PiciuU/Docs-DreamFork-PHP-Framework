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
                        <h1>File Storage</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#configuration">Configuration</a>
                                <ul>
                                    <li>
                                        <a href="#the-local-disk">The Local Disk</a>
                                    </li>
                                    <li>
                                        <a href="#the-public-disk">The Public Disk</a>
                                    </li>
                                    <li>
                                        <a href="#the-log-disk">The Log Disk</a>
                                    </li>
                                    <li>
                                        <a href="#creating-custom-disk">Creating Custom Disk</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#working-with-filesystem">Working With Filesystem</a>
                                <ul>
                                    <li>
                                        <a href="#obtaining-disk-instances">Obtaining Disk Instances</a>
                                    </li>
                                    <li>
                                        <a href="#retrieving-files">Retrieving Files</a>
                                    </li>
                                    <li>
                                        <a href="#storing-files">Storing Files</a>
                                    </li>
                                    <li>
                                        <a href="#uploading-files">Uploading Files</a>
                                    </li>
                                    <li>
                                        <a href="#deleting-files">Deleting Files</a>
                                    </li>
                                    <li>
                                        <a href="#disk-scopes">Disk Scopes</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            D  reamFork provides a filesystem to facilitate working with files. This filesystem leverages the Symfony Filesystem component for enhanced file management capabilities.
                        </p>
                        <h2 id="configuration">
                            <a href="#configuration">Configuration</a>
                        </h2>
                        <p>
                            DreamFork's filesystem configuration file is located at <code>/config/storage.php</code>. In this file, you can define disks for the filesystem. All disks utilize files stored locally on the server running the DreamFork application. For each disk, you can define four options:
                        </p>
                        <div class="content-list">
                            <ul>
                                <li>
                                    <code>root</code>: Indicates the absolute path to the directory
                                </li>
                                <li>
                                    <code>url</code>: Specifies the public address of the directory through a symbolic link (optional).
                                </li>
                                <li>
                                    <code>log_exceptions</code>: Specifies whether the filesystem should log exceptions encountered while working with files (optional, false by default).
                                </li>
                                <li>
                                    <code>throw</code>: Specifies whether exceptions encountered during file operations should be thrown (optional, false by default).
                                </li>
                            </ul>
                        </div>
                        <p>
                            You may configure as many disks as you like.
                        </p>
                        <h3 id="the-local-disk">
                            <a href="#the-local-disk">The Local Disk</a>
                        </h3>
                        <p>
                            The local disk points to the <code>/storage/app</code> folder. It can be utilized when you want to store files that shouldn't be publicly accessible. For example, if your application generates documents based on a user-filled form, you may choose to save these files on the local disk. Access to the public disk can also be obtained from the local disk.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Storage;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>Storage::disk('local')->put('document.txt', 'Some content');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="the-public-disk">
                            <a href="#the-public-disk">The Public Disk</a>
                        </h3>
                        <p>
                            The public disk points to the <code>/storage/app/public</code> folder, which is a directory that can be symbolically linked for public access, such as from a web browser. It is recommended to use this disk when working with files intended for public access.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Storage;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>Storage::disk('public')->saveFile($file, $sourcePath, $filename);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                By default, the public disk's <code>url</code> option points to the "/storage" path. If you have created a <a href="https://docs.dreamfork.dev/docs/1.x/structure#the-storage-directory">symbolic link</a> with a custom name, you need to specify that name in the storage configuration file for the <code>url</code> option.
                            </p>
                        </blockquote>
                        <h3 id="the-log-disk">
                            <a href="#the-log-disk">The Log Disk</a>
                        </h3>
                        <p>
                            The log disk points to the <code>/storage/logs</code> folder and is used by the framework for generating logs. If you wish to create your own event logs, you can utilize this disk.
                        </p>
                        <h3 id="creating-custom-disk">
                            <a href="#creating-custom-disk">Creating Custom Disk</a>
                        </h3>
                        <p>
                            Creating custom disks is straightforward. You only need to define a new entry in your configuration file and set the appropriate options. For example, let's say you frequently store images in a specific folder in your application. You can define a disk for this folder to avoid the need to specify the folder each time you use one of the default disks:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>'disks' => [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// ...</span>
                                    </div>
                                    <div class="line indent">
                                        <span>uploads' => [</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'root' => storage_path('app/public/uploads'),</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'url' => env('APP_URL').'/storage/uploads',</span>
                                    </div>
                                    <div class="line indent">
                                        <span>],</span>
                                    </div>
                                    <div class="line">
                                        <span>];</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="working-with-filesystem">
                            <a href="#working-with-filesystem">Working With Filesystem</a>
                        </h2>
                        <h3 id="obtaining-disk-instances">
                            <a href="#obtaining-disk-instances">Obtaining Disk Instances</a>
                        </h3>
                        <p>
                            The <code>Storage</code> facade can be utilized to interact with any of the configured disks. For instance, you can use the files method on the 'local' disk to list files from that directory. If you call the </code>disk()</code> method without any arguments, the default disk defined in the configuration will be used.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Storage;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>Storage::disk()->files(); // disk => 'local'</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="retrieving-files">
                            <a href="#retrieving-files">Retrieving Files</a>
                        </h3>
                        <p>
                            The <code>get</code> method can be used to retrieve the contents of the specified file. If the file is not existing, <code>null</code> will be returned.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Storage::disk('public')->get('data.txt');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>exists</code> method can be used to check whether a specific file or directory exists on the disk.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>if (Storage::disk('public')->exists('image.png')) {</span>
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
                            The <code>files</code> method facilitates listing files. You can provide the directory you want to list as the first argument; by default, it is the root directory of the specified disk. The second argument is optional and allows you to specify whether to list hidden files.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$files = Storage::disk('public')->files();</span>
                                    </div>
                                    <div class="line">
                                        <span>$filesWithHidden = Storage::disk('public')->files('', true);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>files</code> method, however, does not perform a deep search; it only returns files directly within the specified folder. To list all files in a given folder, you should use the <code>allFiles</code> method. It accepts the same arguments as <code>files</code>.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$allFiles = Storage::disk('public')->allFiles('', true);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>directories</code> method can be used list directories in a specified folder. You can provide the name of the folder as the first argument; by default, it is the root folder for the specified disk.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$directories = Storage::disk('public')->directories();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>fileSize</code> method retrieves the size of a file in bytes while the <code>formattedFileSize</code> method retrieves the size of a file in a human-readable format (e.g., "2.50MB").
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$fileSize = Storage::disk('public')->fileSize('image.png');</span>
                                    </div>
                                    <div class="line">
                                        <span>$formattedFileSize = Storage::disk('public')->formattedFileSize('image.png');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>dirSize</code> method retrieves the size of a directory in bytes while the <code>formattedDirSize</code> method retrieves the size of a directory in a human-readable format (e.g., "2.50MB").
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$dirSize = Storage::disk('public')->dirSize('image.png');</span>
                                    </div>
                                    <div class="line">
                                        <span>$formattedDirSize = Storage::disk('public')->formattedDirSize('image.png');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>lastModified</code> method retrieves the last modified timestamp of a file or directory.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$lastModifiedFile = Storage::disk('public')->lastModified('image.png');</span>
                                    </div>
                                    <div class="line">
                                        <span>$lastModifiedDir = Storage::disk('public')->lastModified('images');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="file-urls">
                            <a href="#file-urls">File URLs</a>
                        </h4>
                        <p>
                            You can use the <code>url</code> method to obtain a URL for a specific file. This method utilizes the url option from the disk configuration and should only be used for the public disk.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$url = Storage::disk('public')->url('image.png');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                When using this method, keep in mind that to make the obtained URL accessible, you need to create a <a href="https://docs.dreamfork.dev/docs/1.x/structure#the-storage-directory">symbolic link</a> for the public folder beforehand.
                            </p>
                        </blockquote>
                        <h4 id="url-host-customization">
                            <a href="#url-host-customization">URL Host Customization</a>
                        </h4>
                        <p>
                            If you would like to change the host for URLs generated using the Storage facade, you may edit a url option to the disk's configuration array:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>'public' => [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// ...</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'url' => env('APP_URL').'/custom'</span>
                                    </div>
                                    <div class="line">
                                        <span>]</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="storing-files">
                            <a href="#storing-files">Storing Files</a>
                        </h3>
                        <p>
                            The <code>put</code> method can be used to store file contents on a disk. Remember, all file paths should be specified relative to the "root" location configured for the disk:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Storage::disk('public')->put('file.jpg', $contents);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            If the <code>put</code> method (or other "write" operations) is unable to write the file to disk, false will be returned. If you wish, you may define the throw option within your filesystem disk's configuration array. When this option is defined as true, unsuccessful filesystem operations will throw the appropriate exception.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>'public' => [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// ...</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'throw' => true</span>
                                    </div>
                                    <div class="line">
                                        <span>]</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>makeDirectory</code> method allows you to create a directory or directories. The first argument is the path to create, the second optional argument is the permissions for the folder, and the third is whether to create parent directories if they do not exist.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Storage::disk('public')->makeDirectory('images/avatars');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>storeTextFile</code> method stores the content in a text file at the specified path. It accepts two arguments: the path for the text file and the content to be written to the file.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Storage::disk('public')->storeTextFile('files/data', 'content');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>writeTextFile</code> method writes content to a text file at the specified path, optionally appending to an existing file. It requires two mandatory arguments, similar to <code>storeTextFile</code>, and two optional arguments: whether the text should be appended at the beginning or end of the file (default is false for the end of the file), and whether a newline character should be added (default is true).
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Storage::disk('public')->writeTextFile('files/data', 'more content at beginning', true, true);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>saveFile</code> method saves an uploaded file to the specified directory with the specified filename, optionally overwriting an existing file. It requires three mandatory arguments: the file to be saved, the path for the file, the filename, and one optional argument whether it should overwrite a potentially existing file (default is false).
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Storage::disk('public')->saveFile($file, $path, $filename);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="copying-moving-files">
                            <a href="#copying-moving-files">Copying & Moving Files</a>
                        </h4>
                        <p>
                            The <code>copy</code> method may be used to copy an existing file to a new location on the disk, while the <code>move</code> method may be used to rename or move an existing file to a new location. Additionally, you can use the <code>rename</code> method, which is essentially an alias for the <code>move</code> method.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Storage::disk('public')->copy('original.jpg', 'copied.jpg');</span>
                                    </div>
                                    <div class="line">
                                        <span>Storage::disk('public')->move('old.jpg', 'new.jpg');</span>
                                    </div>
                                    <div class="line">
                                        <span>Storage::disk('public')->rename('old.jpg', 'new.jpg');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="uploading-files">
                            <a href="#uploading-files">Uploading Files</a>
                        </h3>
                        <p>
                            In your application, you may need to save files uploaded by users. To achieve this, you can use one of the previously described functions, such as <code>saveFile()</code>.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Storage::disk('public')->saveFile($request->files->get('attachment'), 'uploads', 'image.png');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                Keep in mind that the folder provided for saving the file must already exist, as <code>saveFile</code> does not create it in case it is missing.
                            </p>
                        </blockquote>
                        <h3 id="deleting-files">
                            <a href="#deleting-files">Deleting Files</a>
                        </h3>
                        <p>
                            The <code>remove</code> method takes a single argument, which is the name of the individual file or directory to be deleted. You can also use the <code>delete</code> method, which is an alias for <code>remove</code>.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Storage::disk('public')->remove('uploads/image.png');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                Keep in mind that this method deletes the specified file or directory unconditionally. Therefore, if you specify a folder for deletion that contains other folders and files, it will be removed without warning, along with its entire contents.
                            </p>
                        </blockquote>
                        <h3 id="disk-scopes">
                            <a href="#disk-scopes">Disk Scopes</a>
                        </h3>
                        <p>
                            The Dreamfork filesystem appropriately secures executed operations in terms of scope access. This means that performing operations on an object outside the path defined as the root for a specific disk is not possible. Let's illustrate this with the following example:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Storage::disk('public')->allFiles('../');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Such an operation will fail or <code>throw</code> an exception when the throw option is enabled in the configuration. This is because using '../' attempts to access content beyond the disk's scope. Given that the 'public' disk has its root path directed to /storage/app/public, using '../' would navigate to storage/app, which is disallowed due to being outside the disk's scope.
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
