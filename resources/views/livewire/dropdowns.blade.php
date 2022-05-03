<div class="grid grid-cols-6 gap-6">
<div class="col-span-6 sm:col-span-6 lg:col-span-2">
    <label for="coop_TypeL1" class="block text-sm font-medium text-gray-700">Type of Member *</label>
    <select id="coop_TypeL1" wire:model="t1" name="coop_TypeL1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('coop_TypeL1')) border border-red-500 @endif">
        <option value=""></option>
        @foreach($type1s as $type1)
            <option value="{{ $type1->coop_L1ID }}">{{ $type1->coop_L1Text }}</option>
        @endforeach
    </select>
</div>
@if(count($t2s) > 0)
<div class="col-span-6 sm:col-span-6 lg:col-span-2">
    <label for="coop_TypeL2" class="block text-sm font-medium text-gray-700">Employment Status *</label>
    <select id="coop_TypeL2" wire:model="t2" name="coop_TypeL2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('coop_TypeL2')) border border-red-500 @endif">
        <option value=""></option>
        @foreach($t2s as $type2)
            <option value="{{ $type2->coop_L2ID }}">{{ $type2->coop_L2Text  }}</option>
        @endforeach
    </select>

</div>
    @endif
 </div>
   
