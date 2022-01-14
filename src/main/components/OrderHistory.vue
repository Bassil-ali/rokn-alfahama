<template>
  <div class="col-md-10">
    <div class="entry-content-myaccount order-details">
      <h2>{{ $t("The_date_of_order") }}</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{ $t("order_date") }}</th>
            <th scope="col">{{ $t("The_date_of_order") }}</th>
            <th scope="col">{{ $t("status") }}</th>
            <th scope="col">{{ $t("total_summation") }}</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <figure class="mb-0">
                <img
                  src="assets/images/54c5989ec7bc8b192c60f9e9a0dae937.jpg"
                  alt=""
                />
              </figure>
            </td>
            <td data-title="الاسم ">مصحف اسلامي ذهبي من الطراز الفاخر</td>
            <td data-title="الكمية ">2</td>
            <td data-title="السعر ">1300 $</td>
          </tr>
          <tr>
            <td>
              <figure class="mb-0">
                <img
                  src="assets/images/54c5989ec7bc8b192c60f9e9a0dae937.jpg"
                  alt=""
                />
              </figure>
            </td>
            <td data-title="الاسم ">مصحف اسلامي ذهبي من الطراز الفاخر</td>
            <td data-title="الكمية ">2</td>
            <td data-title="السعر ">1300 $</td>
          </tr>
        </tbody>
      </table>
        <h2>{{$t('Shipping_place')}}</h2>
      <div class="box address">
        <strong><i class="fas fa-map-marker-alt"></i> {{$t('address')}}</strong>
        <ul>
          <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
          <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
          <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
        </ul>
      </div>
    </div>
  </div>
</template>
