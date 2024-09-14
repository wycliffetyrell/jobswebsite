<x-layout>
    <x-page-heading> New Jobs</x-page-heading>
    <x-forms.form method="POST" action="/jobs">

        <x-forms.input label="Title" name="title" placeholder="Cec" />
        <x-forms.input label="Salary" name="salary" placeholder="$90,000 USD" />
        <x-forms.input label="Location" name="location" placeholder="Nairobi Garage Karen" />
        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured"/>
        <x-forms.input label="ERL" name="url" placeholder="https://acnae.com/jobs/ceo-wanted" />
        <x-forms.divider />
        <x-forms.input label="Tags (somma separated)" name="tags" placeholder="laracast, video, education" />
        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
