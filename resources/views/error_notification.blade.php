@if (session('bao_loi'))
    <script>alert('{{ session('bao_loi') }}');</script>
@endif