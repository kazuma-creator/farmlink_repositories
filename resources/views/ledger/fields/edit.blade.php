@extends('layouts.app')

@section('content')
<div class="container">
    <h1>圃場編集</h1>
    <form action="{{ route('ledger.fields.update', $field->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">圃場名</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $field->name }}" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">面積</label>
            <input type="text" name="area" id="area" class="form-control" value="{{ $field->area }}" required>
        </div>
        <div class="mb-3">
            <label for="ownership" class="form-label">所有形態</label>
            <select name="ownership" id="ownership" class="form-control">
                <option value="owned" {{ $field->ownership == 'owned' ? 'selected' : '' }}>所有</option>
                <option value="leased" {{ $field->ownership == 'leased' ? 'selected' : '' }}>借地</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
