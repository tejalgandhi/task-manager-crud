<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <style>
        #task-list li {
            padding: 10px;
            margin-bottom: 5px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
    </style>
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4">Task Manager</h1>

    <form method="GET" action="{{ route('tasks.index') }}" class="mb-3">
        <div class="mb-3">
            <label for="projectSelect" class="form-label">Select Project</label>
            <select class="form-select" id="projectSelect" name="project_id" onchange="this.form.submit()">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $project->id == $projectId ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <form method="POST" action="{{ route('tasks.store') }}" class="row g-3 align-items-center mb-4">
        @csrf
        <div class="col-auto">
            <input type="text" name="name" class="form-control" placeholder="New task name" required>
            <input type="hidden" name="project_id" value="{{ $projectId }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Add Task</button>
        </div>
    </form>

    <ul id="task-list" class="list-unstyled">
        @foreach($tasks as $task)
            <li data-id="{{ $task->id }}">
                <div class="d-flex justify-content-between align-items-center">
                    <form method="POST" action="{{ route('tasks.update', $task) }}" class="d-flex align-items-center gap-2 flex-grow-1">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" class="form-control" value="{{ $task->name }}">
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </form>
                    <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
    $(function () {
        $('#task-list').sortable({
            update: function (event, ui) {
                let order = $(this).children().map(function () {
                    return $(this).data('id');
                }).get();

                $.post("{{ route('tasks.reorder') }}", {
                    _token: '{{ csrf_token() }}',
                    tasks: order
                });
            }
        });
    });
</script>

</body>
</html>
