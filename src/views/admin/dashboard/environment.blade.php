<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Середовище</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($envs as $env)
                        <tr>
                            <td width="120px">{{ $env['name'] }}</td>
                            <td>{{ $env['value'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>