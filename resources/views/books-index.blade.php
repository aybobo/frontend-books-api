<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Books</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5 mb-5">
        <h1 class="text-center text-muted">Books Frontend</h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S/No</th>
                            <th>Name</th>
                            <th>ISBN</th>
                            <th>Authors</th>
                            <th>Country</th>
                            <th>No. of Pages</th>
                            <th>Publisher</th>
                            <th>Release Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>
                                    @php
                                        $count = count($book->authors);
                                        $i = 0;
                                        foreach ($book->authors as $author) {
                                            if ($i < $count-1) {
                                                echo $author->name .', ';
                                            } else {
                                                echo $author->name;
                                            }
                                            $i++;
                                        }
                                    @endphp
                                </td>
                                <td>{{ $book->country }}</td>
                                <td>{{ $book->number_of_pages }}</td>
                                <td>{{ $book->publisher }}</td>
                                <td>
                                    @php
                                        $date = date("d/m/Y", strtotime($book->release_date));
                                    @endphp
                                    {{ $date }}
                                </td>
                                <td>
                                    <a href="{{ route('book.edit', ['id' => $book->id]) }}" class=""><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('book.delete', ['id' => $book->id]) }}" method="post" style="display: inline !important;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger" onclick="return confirm('Are you sure you want to delete this book?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No record</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</body>
</html>