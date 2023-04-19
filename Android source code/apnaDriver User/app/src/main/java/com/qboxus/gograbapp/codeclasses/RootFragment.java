package com.qboxus.gograbapp.codeclasses;



import androidx.fragment.app.Fragment;

import com.qboxus.gograbapp.Interface.OnBackPressListener;


public class RootFragment extends Fragment implements OnBackPressListener {

    @Override
    public boolean onBackPressed() {
        return new BackPressImplementation(this).onBackPressed();
    }
}