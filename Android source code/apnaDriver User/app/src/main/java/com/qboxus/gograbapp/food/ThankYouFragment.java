package com.qboxus.gograbapp.food;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.qboxus.gograbapp.codeclasses.RootFragment;
import com.qboxus.gograbapp.Interface.FragmentCallBack;
import com.qboxus.gograbapp.R;
import com.qboxus.gograbapp.databinding.FragmentThankyouBinding;


public class ThankYouFragment extends RootFragment implements View.OnClickListener {

    FragmentThankyouBinding binding;
    FragmentCallBack callbackResponse;

    public ThankYouFragment(FragmentCallBack fragmentCallback) {
        this.callbackResponse = fragmentCallback;
    }

    public ThankYouFragment() {
        //required empty constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        binding = FragmentThankyouBinding.inflate(getLayoutInflater());
        View view = binding.getRoot();
        initializeListeners();

        return view;
    }

    private void initializeListeners() {
        binding.backToHomeBtn.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {

            case R.id.back_to_home_btn:
                getActivity().onBackPressed();
                if (callbackResponse != null)
                    callbackResponse.onItemClick(new Bundle());
                break;

            default:
                break;
        }
    }

    @Override
    public void onDetach() {
        super.onDetach();

    }
}