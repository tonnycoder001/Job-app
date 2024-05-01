<x-layout>
    <x-slot:heading>
        Create  Job
    </x-slot:heading>
    <h2>
        {{$job->title}}
    </h2>
    <p>
        This job pays {{$job->salary}} Per year.
    </p>

 <div class="mt-6 flex gap-x-6">
    <a href="/jobs/{{$job->id}}/edit" class="rounded-lg bg-gray-500 text-white p-2">Edit Job</a>
 </div>

</x-layout>
