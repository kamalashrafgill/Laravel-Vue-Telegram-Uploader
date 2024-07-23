<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
      <div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-lg border border-gray-300">
        <file-pond
          name="file"
          ref="pond"
          label-idle="Drop files here or <span class='filepond--label-action'>Browse</span>"
          v-bind:allow-multiple="false"
          allowRevert="false"
          accepted-file-types="image/jpeg, image/png"
          server="http://127.0.0.1:8000/api/upload"
          v-bind:files="myFiles"
          v-on:init="handleFilePondInit"
          class="filepond-border"
        />
      </div>
    </div>
  </template>
    
    <script>
    import vueFilePond from "vue-filepond";
    import "filepond/dist/filepond.min.css";
    import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";  
    import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
    import FilePondPluginImagePreview from "filepond-plugin-image-preview";
    
    const FilePond = vueFilePond(
      FilePondPluginFileValidateType,
      FilePondPluginImagePreview
    );
    
    export default {
      name: "app",
      data: function () {
        return { myFiles: [] };
      },
      methods: {
        handleFilePondInit: function () {
          console.log("FilePond has initialized");
        },
      },
      components: {
        FilePond,
      },
    };
    </script>