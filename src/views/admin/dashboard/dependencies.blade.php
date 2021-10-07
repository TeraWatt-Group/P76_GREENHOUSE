<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Залежності</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dependencies as $dependency => $version)
                        <tr>
                            <td width="240px">{{ $dependency }}</td>
                            <td>{{ $version }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>