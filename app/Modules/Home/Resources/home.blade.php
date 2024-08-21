@extends('layouts.main')

@section('content')

<section class="forms">
    <div class="modelContainer">
        <article>
            <h2>Create Invoice</h2>
            
            <form action="{{ route('invoice.store') }}" method="POST">
                @csrf

                <label for="number">Number:</label>
                <input type="text" name="number" id="number" placeholder="Number">
                <br><br>

                <label for="title">Title:</label>
                <input type="text" name="title" id="title" placeholder="title">
                <br><br>

                <label for="service">Service:</label>
                <input type="text" name="service" id="service" placeholder="Service">
                <br><br>

                <label for="price">Price:</label>
                <input type="number" name="price" id="price" placeholder="Price">
                <br><br>

                <input type="submit">
            </form>

        </article>

        <article>
            <h2>Create Report</h2>
            
            <form action="{{ route('report.store') }}" method="POST">
                @csrf

                <label for="number">Number:</label>
                <input type="text" name="number" id="number" placeholder="Number">
                <br><br>

                <label for="title">Title:</label>
                <input type="text" name="title" id="title" placeholder="title">
                <br><br>

                <label for="description">Description:</label>
                <input type="text" name="description" id="description" placeholder="Description">
                <br><br>

                <input type="submit">
            </form>

        </article>
    </div>

    <div class="modelContainer">
        <article>
            <h2>Upload Document</h2>

            <form action="{{ route('document.store.file') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="title">Title:</label>
                <input type="text" name="title" id="title" placeholder="Title" required>
                <br><br>

                <label for="size">Size:</label>
                <input type="text" name="size" id="size" placeholder="Size, eg. A6" required>
                <br><br>

                <label for="isColorful">Is colorful:</label>
                <input type="checkbox" name="isColorful" id="isColorful">
                <br><br>

                <label for="pages">Pages:</label>
                <input type="number" name="pages" id="pages" required>
                <br><br>

                <input type="file" name="file" id="file">
                <br><br>

                <select name="model">
                    <option selected hidden>For which Model?</option>
                    <option value="invoice">Invoice</option>
                    <option value="report">Report</option>
                </select>
                <br><br>

                <select name="instance">
                    <option selected hidden>For which instance?</option>
                    @foreach($instances as $instance)
                        echo "<option value='{{$instance->id}}'>{{$instance->title}}</option>";
                    @endforeach
                </select>
                <br><br>

                <label for="parent_id">Parent id:</label>
                <input type="number" name="parent_id" id="parent_id" placeholder="Parent name (optional)">
                <br><br>

                <input type="submit">
            </form>
        </article>

        <article>
            <h2>Create directory</h2>

            <form action="{{ route('document.store.directory') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="dir_name" placeholder="Directory name">
                <br><br>

                <select name="model">
                    <option selected hidden>For which Model?</option>
                    <option value="invoice">Invoice</option>
                    <option value="report">Report</option>
                </select>
                <br><br>

                <select name="instance">
                    <option selected hidden>For which instance?</option>
                    @foreach($instances as $instance)
                        echo "<option value='{{$instance->id}}'>{{$instance->title}}</option>";
                    @endforeach
                </select>
                <br><br>

                <input type="number" name="parent_id" placeholder="Parent name (optional)">
                <br><br>

                <input type="submit">
            </form>
        </article>
    </div>

    <div class="modelContainer">
        <article>
            <h2>Upload Image</h2>

            <form action="{{ route('image.store.file') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="title">Title:</label>
                <input type="text" name="title" id="title" placeholder="Title" required>
                <br><br>

                <label for="resolution">Resolution:</label>
                <input type="text" name="resolution" id="resolution" placeholder="Resolution" required>
                <br><br>

                <label for="isColorful">Is colorful:</label>
                <input type="checkbox" name="isColorful" id="isColorful">
                <br><br>

                <input type="file" name="file" id="file">
                <br><br>

                <select name="model">
                    <option selected hidden>For which Model?</option>
                    <option value="invoice">Invoice</option>
                    <option value="report">Report</option>
                </select>
                <br><br>

                <select name="instance">
                    <option selected hidden>For which instance?</option>
                    @foreach($instances as $instance)
                        echo "<option value='{{$instance->id}}'>{{$instance->title}}</option>";
                    @endforeach
                </select>
                <br><br>

                <label for="parent_id">Parent id:</label>
                <input type="number" name="parent_id" id="parent_id" placeholder="Parent name (optional)">
                <br><br>

                <input type="submit">
            </form>
        </article>

        <article>
            <h2>Create directory</h2>

            <form action="{{ route('image.store.directory') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="name" placeholder="Directory name">
                <br><br>

                <select name="model">
                    <option selected hidden>For which Model?</option>
                    <option value="invoice">Invoice</option>
                    <option value="report">Report</option>
                </select>
                <br><br>

                <select name="instance">
                    <option selected hidden>For which instance?</option>
                    @foreach($instances as $instance)
                        echo "<option value='{{$instance->id}}'>{{$instance->title}}</option>";
                    @endforeach
                </select>
                <br><br>

                <input type="number" name="parent_id" placeholder="Parent name (optional)">
                <br><br>

                <input type="submit">
            </form>
        </article>
    </div>
</section>

<section class="dump">
    <div>
        <h2>Invoices</h2>
        <div class="instancesContainer">
        @foreach($invoices as $invoice)
            <div class="instance">
                <h3>Title: {{ $invoice->title }}</h3>
                <h3>Id: {{ $invoice->id }}</h3>
                <p>Number: {{ $invoice->number }}</p>
                <p>Service: {{ $invoice->service }}</p>
                <p>Price: {{ $invoice->price }}</p>
            </div>
        @endforeach
        </div>
    </div>

    <div>
        <h2>Reports</h2>
        <div class="instancesContainer">
        @foreach($reports as $report)
            <div class="instance">
                <h3>Title: {{ $report->title }}</h3>
                <h3>Id: {{ $report->id }}</h3>
                <p>Number: {{ $report->number }}</p>
                <p>Description: {{ $report->description }}</p>
            </div>
        @endforeach
        </div>
    </div>

    <div>
        <h2>Documents</h2>
        <div class="instancesContainer">
        @foreach($documents as $document)
            <div class="instance">
                <h3>Title: {{ $document->title }}</h3>
                <h3>Id: {{ $document->id }}</h3>
                <h3>File id: {{ $document->file_id }}</h3>
                <p>Size: {{ $document->size }}</p>
                <p>Is colorful: {{ $document->is_colorful }}</p>
            </div>
        @endforeach
        </div>
    </div>

    <div>
        <h2>Images</h2>
        <div class="instancesContainer">
        @foreach($images as $image)
            <div class="instance">
                <h3>Title: {{ $image->title }}</h3>
                <h3>Id: {{ $image->id }}</h3>
                <h3>File id: {{ $image->file_id }}</h3>
                <p>Resolution: {{ $image->resolution }}</p>
                <p>Is colorful: {{ $image->is_colorful }}</p>
            </div>
        @endforeach
        </div>
    </div>

    <div>
        <h2>Files</h2>
        <div class="instancesContainer">
        @foreach($files as $file)
            <div class="instance">
                <h3>Display name: {{ $file->display_name }}</h3>
                <h3>Id: {{ $file->id }}</h3>
                <h3>Type: {{ $file->type }}</h3>
                <p>Parent id: {{ $file->parent_id }}</p>
                <p>Fileable id: {{ $file->fileable_id }}</p>
                <p>Fileable type: {{ $file->fileable_type }}</p>
                @if ($file->type == "file")
                <p>Meta data:</p> @dump($file->meta_data)
                @endif
            </div>
        @endforeach
        </div>
    </div>
</section>

@endsection