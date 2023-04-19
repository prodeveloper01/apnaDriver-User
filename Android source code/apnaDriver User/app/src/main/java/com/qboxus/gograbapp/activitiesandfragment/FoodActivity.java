package com.qboxus.gograbapp.activitiesandfragment;

import android.os.Bundle;

import com.qboxus.gograbapp.codeclasses.AppCompatLocaleActivity;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;

import com.qboxus.gograbapp.codeclasses.Functions;
import com.qboxus.gograbapp.codeclasses.MyPreferences;
import com.qboxus.gograbapp.codeclasses.Variables;
import com.qboxus.gograbapp.food.BrowseFragment;
import com.qboxus.gograbapp.food.FavouriteFragment;
import com.qboxus.gograbapp.food.FoodHomeFragment;
import com.qboxus.gograbapp.food.FoodHomeTwo;
import com.qboxus.gograbapp.food.FoodMainFragment;
import com.qboxus.gograbapp.food.OrdersFragment;
import com.qboxus.gograbapp.food.PlaceOrdersFragment;
import com.qboxus.gograbapp.food.RestaurantMenuFragment;
import com.qboxus.gograbapp.food.ResturantAgainstCatFragment;
import com.qboxus.gograbapp.food.SearchFragmentResturant;
import com.qboxus.gograbapp.model.CalculationModel;
import com.qboxus.gograbapp.model.ResturantModel;
import com.qboxus.gograbapp.R;

import java.util.ArrayList;

public class FoodActivity extends AppCompatLocaleActivity implements RestaurantMenuFragment.CallBackListener{

    public FoodMainFragment foodMainFragment;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        Functions.setLocale(MyPreferences.getSharedPreference(this).getString(MyPreferences.setlocale, Variables.DEFAULT_LANGUAGE_CODE)
                , this, getClass(),false);
        setContentView(R.layout.activity_food);


        if (savedInstanceState == null) {
            reload();
        } else {
            foodMainFragment = (FoodMainFragment) getSupportFragmentManager().getFragments().get(0);
        }
    }

    public void reload() {
        foodMainFragment = new FoodMainFragment();
        final FragmentManager fragmentManager = getSupportFragmentManager();
        fragmentManager.beginTransaction().replace(R.id.food_activityContainer, foodMainFragment).commit();
    }

    @Override
    protected void onResume() {
        super.onResume();
    }

    public void checkFragment(){
        for (Fragment fragment : getSupportFragmentManager().getFragments()) {
            if(fragment instanceof FoodHomeFragment){
                FoodHomeFragment mainFragment = (FoodHomeFragment) fragment;
                mainFragment.setUpScreenData();
            }

            if(fragment instanceof FoodHomeTwo){
                FoodHomeTwo mainFragment = (FoodHomeTwo) fragment;
                mainFragment.setUpScreenData();
            }

            if(fragment instanceof FavouriteFragment){
                FavouriteFragment mainFragment = (FavouriteFragment) fragment;
                mainFragment.checkCart();
            }


            if(fragment instanceof OrdersFragment){
                OrdersFragment mainFragment = (OrdersFragment) fragment;
                mainFragment.checkCart();
            }

            if(fragment instanceof BrowseFragment){
                BrowseFragment mainFragment = (BrowseFragment) fragment;
                mainFragment.checkCart();
            }

            if(fragment instanceof RestaurantMenuFragment){
                RestaurantMenuFragment mainFragment = (RestaurantMenuFragment) fragment;
                mainFragment.checkCart(true);
            }

            if(fragment instanceof ResturantAgainstCatFragment){
                ResturantAgainstCatFragment mainFragment = (ResturantAgainstCatFragment) fragment;
                mainFragment.checkCart();
            }

        }
    }



    public void updateist(ArrayList<CalculationModel> carList){
        for (Fragment fragment : getSupportFragmentManager().getFragments()) {
            if(fragment instanceof FoodHomeFragment){
                FoodHomeFragment mainFragment = (FoodHomeFragment) fragment;
                mainFragment.setUpScreenData();
            }

            if(fragment instanceof FoodHomeTwo){
                FoodHomeTwo mainFragment = (FoodHomeTwo) fragment;
                mainFragment.setUpScreenData();
            }

            if(fragment instanceof FavouriteFragment){
                FavouriteFragment mainFragment = (FavouriteFragment) fragment;
                mainFragment.checkCart();
            }


            if(fragment instanceof OrdersFragment){
                OrdersFragment mainFragment = (OrdersFragment) fragment;
                mainFragment.checkCart();
            }

            if(fragment instanceof BrowseFragment){
                BrowseFragment mainFragment = (BrowseFragment) fragment;
                mainFragment.checkCart();
            }

            if(fragment instanceof RestaurantMenuFragment){
                RestaurantMenuFragment mainFragment = (RestaurantMenuFragment) fragment;
                mainFragment.checkCart(true);
            }

            if(fragment instanceof ResturantAgainstCatFragment){
                ResturantAgainstCatFragment mainFragment = (ResturantAgainstCatFragment) fragment;
                mainFragment.checkCart();
            }

        }
    }


    @Override
    public void onCallBack() {
        for (Fragment fragment : getSupportFragmentManager().getFragments()) {

            if(fragment instanceof PlaceOrdersFragment){
                PlaceOrdersFragment mainFragment = (PlaceOrdersFragment) fragment;
                mainFragment.updateList(true);
            }

        }
    }

    public void updateFav(ResturantModel recipeDataModel) {
        for (Fragment fragment : getSupportFragmentManager().getFragments()) {
            if(fragment instanceof FoodHomeFragment){
                FoodHomeFragment mainFragment = (FoodHomeFragment) fragment;
                mainFragment.getChangedList(recipeDataModel);
            }

            if(fragment instanceof FoodHomeTwo){
                FoodHomeTwo mainFragment = (FoodHomeTwo) fragment;
                mainFragment.getChangedList(recipeDataModel);
            }

            if(fragment instanceof SearchFragmentResturant){
                SearchFragmentResturant mainFragment = (SearchFragmentResturant) fragment;
                mainFragment.getChangedList(recipeDataModel);
            }
        }
    }
}