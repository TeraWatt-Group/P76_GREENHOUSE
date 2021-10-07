<div class="table-responsive">
    <table {{ $attributes->merge(['class' => 'table mb-0']) }}>
    	<thead class="table-light">
    		<tr>
    			{{ $head }}
    		</tr>
    	</thead>
    	<tbody>
    		{{ $body }}
    	</tbody>
        @if (isset($foot))
            <tfoot>
                {{ $foot }}
            </tfoot>
        @endif
    </table>
</div>
