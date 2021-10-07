@php
$id = $id ?? md5($attributes->wire('model'));
switch ($type ?? '') {
    case 'range':
        $type = 'range';
        $placeholder = date('d.m.Y') . ' — ' . date('d.m.Y');
        break;
    case 'multiple':
        $type = 'multiple';
        $placeholder = date('d.m.Y');
        break;
    case 'single':
    default:
        $type = 'single';
        $placeholder = date('d.m.Y');
        break;
}
@endphp

<div {{ $attributes }}>
    <input
        x-data="{}"
        x-init="() => {
            flatpickr(document.getElementById('{{ $id }}'), {
                locale: 'uk',
                mode: '{{ $type }}',
                // minDate: '2021-05-01',
                // maxDate: 'today',
                // enableTime: true,
                // time_24hr: true,
                // minTime: '07:00',
                // maxTime: '20:00',
                dateFormat: 'd.m.Y',
                // defaultDate: ['2016-10-10', '2016-10-20']
                // static: false,
                onClose: function (dates, currentdatestring, picker) {
                    console.log(dates);
                }
            });
        }"
        id="{{ $id }}"
        type="text"
        class="form-control"
        placeholder="{{ $placeholder }}"
    >
</div>
