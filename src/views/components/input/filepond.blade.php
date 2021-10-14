<div
	wire:ignore
	x-data
	x-init="
		FilePond.setOptions({
			server: {
		        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {

		        },
		    },
		});
		FilePond.create($refs.input);
	"
>

	<input type="file" x-ref="input" />
</div>