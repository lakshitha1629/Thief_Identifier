<div class="form-row mt-4 ml-auto card">

<div class="card-header">Role</div>
<div class="card-body">

  <div class="form-row">
    <kendo-formfield>
      <kendo-dropdownlist #role isRequired="true" formControlName="Role" [data]="roles"
        [defaultItem]="{ Name: 'Select Role', RoleId: null }" [textField]="'Name'"
        [valueField]="'RoleId'">
      </kendo-dropdownlist>
      <kendo-formerror>Required</kendo-formerror>
    </kendo-formfield>
  </div>
</div>

</div>

</div>