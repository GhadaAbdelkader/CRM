<ul class="items-center w-full text-sm mb-6 font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center ps-3" :class="{ 'border-b border-teal-600 text-teal-600 bg-green-50': currentTab === 'personal' }">
            <input id="personal-checkbox-list" type="checkbox" value="personal" class="w-4 h-4 text-white bg-gray-100  rounded-lg focus:ring-teal-600 dark:focus:ring-teal-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                   :checked="completedTabs.includes('personal')" disabled  >
            <label for="personal-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Personal Info</label>
        </div>
    </li>
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center ps-3" :class="{ 'border-b border-teal-600 text-teal-600 bg-green-50': currentTab === 'company' }">
            <input id="company-checkbox-list" type="checkbox" value="company" class="w-4 h-4 text-white bg-gray-100  rounded-lg focus:ring-teal-600 dark:focus:ring-teal-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                   :checked="completedTabs.includes('company')" disabled  >
            <label for="company-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Company Info</label>
        </div>
    </li>
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center ps-3" :class="{ 'border-b border-teal-600 text-teal-600 bg-green-50': currentTab === 'address' }">
            <input id="address-checkbox-list" type="checkbox" value="address" class="w-4 h-4 text-white bg-gray-100  rounded-lg focus:ring-teal-600 dark:focus:ring-teal-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                   :checked="completedTabs.includes('address')" disabled  >
            <label for="address-checkbox-list" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Address</label>
        </div>
    </li>

</ul>
