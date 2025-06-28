@extends(
    "landing.layouts.app",
    [
        "title" => "soal psikotes",
        "active" => "one psikotes",
    ]
)

@section("content")
    @if ($psikotesTool->sections[0]->questions[0]->type)
        @include("landing.psikotes-paid.tools.types." . Str::slug($psikotesTool->sections[0]->questions[0]->type))
    @endif
@endsection
