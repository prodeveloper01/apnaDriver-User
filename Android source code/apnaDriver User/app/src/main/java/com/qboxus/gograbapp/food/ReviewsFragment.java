package com.qboxus.gograbapp.food;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.recyclerview.widget.LinearLayoutManager;

import com.qboxus.gograbapp.codeclasses.Functions;
import com.qboxus.gograbapp.codeclasses.RootFragment;
import com.qboxus.gograbapp.foodadapter.ReviewAdapter;
import com.qboxus.gograbapp.model.RestaurantRatingModel;
import com.qboxus.gograbapp.model.ResturantModel;
import com.qboxus.gograbapp.R;
import com.qboxus.gograbapp.databinding.FragmentReviewsBinding;

import java.util.ArrayList;


public class ReviewsFragment extends RootFragment implements View.OnClickListener {

    FragmentReviewsBinding binding;
    ArrayList<RestaurantRatingModel> reviewModelArrayList = new ArrayList<>();
    ReviewAdapter reviewAdapter;
    ResturantModel resturantModel;
    Bundle bundle;

    public ReviewsFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        binding = FragmentReviewsBinding.inflate(getLayoutInflater());
        View view = binding.getRoot();

        bundle = getArguments();
        if (bundle != null) {
            resturantModel = (ResturantModel) bundle.getSerializable("dataModel");
        }
        initLayouts();
        initializeListeners();
        getReviewData();
        return view;
    }

    private void initializeListeners() {

        binding.backBtn.setOnClickListener(this);
    }

    private void initLayouts() {

        String reviewCount = Functions.getSuffix(resturantModel.getTotalRatingCount());
        if(reviewCount.equals("1")) {
            binding.tvAvgRating.setText(resturantModel.getTotalRatings() + " (" + reviewCount +binding.getRoot().getContext().getString(R.string.review) + ")");
        }else{
            binding.tvAvgRating.setText(resturantModel.getTotalRatings() + " (" + reviewCount +binding.getRoot().getContext().getString(R.string.reviews) + ")");
        }
    }

    @Override
    public void onClick(View v) {

        switch (v.getId()) {

            case R.id.backBtn:

                Functions.hideSoftKeyboard(getActivity());
                getActivity().onBackPressed();

                break;

            default:
                break;
        }
    }

    private void getReviewData() {
        reviewModelArrayList.clear();
        reviewModelArrayList = resturantModel.getRestaurantRatingModelArrayList();
        methodSetReviewAdapter();
    }

    private void methodSetReviewAdapter() {

        reviewAdapter = new ReviewAdapter(getActivity(), reviewModelArrayList);
        binding.reviewRecyclerView.setLayoutManager(new LinearLayoutManager(getActivity(), LinearLayoutManager.VERTICAL, false));
        binding.reviewRecyclerView.setAdapter(reviewAdapter);
        reviewAdapter.notifyDataSetChanged();

    }

}