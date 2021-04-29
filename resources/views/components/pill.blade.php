
    <label {{ $attributes->merge([
            'for' => $utype,
            'class'=>
            'mr-5 p-4 rounded-pill
             cursor-pointer select-none
             rounded border-blue-100
             shadow-md
             hover:border hover:rounded hover:border-blue-300
             hover:shadow-xl',
             ':class'=> '{"bg-blue-700 text-white font-medium shadow-xs": utype=="'.$utype.'"}',
        ])
    }}>

        <input {{ $attributes->merge([
            'x-model'=> 'utype',
            'type'  => 'radio',
            'value' => $utype,
            '@change' => 'utype="'.$utype.'"',
            'name'  => 'type',
            'class' => 'hidden',
            'id'    => $utype
        ])
    }}/>
        <span>{{ $slot }}</span>
</label>


