package com.qboxus.gograbapp.codeclasses;

import android.content.Context;
import android.content.res.TypedArray;
import android.graphics.drawable.Drawable;
import android.text.TextUtils;
import android.util.AttributeSet;
import android.view.View;
import android.widget.LinearLayout;
import android.widget.ProgressBar;
import android.widget.TextView;

import androidx.annotation.NonNull;

import com.qboxus.gograbapp.R;

public class LoadingButton extends LinearLayout {
    private static final int TEXT_DIFF = 14;
    View mRootView;
    private int textColor;
    private String text;
    private int backgroundColor;
    private Drawable background;
    private int textSize;
    private int progressColor;
    private TextView mTextButton;
    private ProgressBar mProgressBar;

    public LoadingButton(Context context) {
        super(context);
        init(context);
    }

    public LoadingButton(Context context, AttributeSet attrs) {
        super(context, attrs);
        getAttributes(context, attrs);
        init(context);
    }

    public LoadingButton(Context context, AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        getAttributes(context, attrs);
        init(context);
    }

    private void getAttributes(Context context, AttributeSet attrs) {
        TypedArray ta = context.getTheme().obtainStyledAttributes(attrs, R.styleable.LoadingButton, 0, 0);
        this.text = ta.getString(R.styleable.LoadingButton_text);
        this.textColor = ta.getColor(R.styleable.LoadingButton_textColor,
                context.getColor(android.R.color.black));
        this.textSize = ta.getDimensionPixelOffset(R.styleable.LoadingButton_textSize, 0);
        this.backgroundColor = ta.getColor(R.styleable.LoadingButton_backgroundColor,
                context.getColor(android.R.color.background_dark));
        this.background = ta.getDrawable(R.styleable.LoadingButton_background);
        this.progressColor = ta.getColor(R.styleable.LoadingButton_progressColor,
                context.getColor(android.R.color.black));

        ta.recycle();
    }

    private void init(Context context) {
        this.mRootView = inflate(context, R.layout.loading_button_layout, this);
        this.mTextButton = mRootView.findViewById(R.id.button);
        this.mProgressBar = mRootView.findViewById(R.id.progress);

        if (!TextUtils.isEmpty(text))
            mTextButton.setText(text);

        if (textColor != 0)
            mTextButton.setTextColor(textColor);

        if (backgroundColor != 0)
            this.mRootView.setBackgroundColor(backgroundColor);

        if (background != null)
            this.mRootView.setBackground(background);

        if (progressColor != 0)
            this.mProgressBar.getIndeterminateDrawable().setColorFilter(progressColor,
                    android.graphics.PorterDuff.Mode.MULTIPLY);
    }

    public void startLoading() {
        this.setEnabled(false);
        this.mProgressBar.setVisibility(VISIBLE);
        this.mTextButton.setVisibility(GONE);
    }

    public void stopLoading() {
        this.setEnabled(true);
        this.mProgressBar.setVisibility(GONE);
        this.mTextButton.setVisibility(VISIBLE);
    }

    public int getTextColor() {
        return textColor;
    }

    public void setTextColor(int textColor) {
        this.textColor = textColor;
        mTextButton.setTextColor(textColor);
    }

    public String getText() {
        return text;
    }

    public void setText(@NonNull String text) {
        this.text = text;
        mTextButton.setText(text);
    }

    public int getTextSize() {
        return textSize;
    }

    public void setTextSize(int textSize) {
        this.textSize = textSize;
        mTextButton.setTextSize(textSize - (textSize - TEXT_DIFF));
    }

    public int getProgressColor() {
        return progressColor;
    }

    public void setProgressColor(int progressColor) {
        this.progressColor = progressColor;
        mProgressBar.getIndeterminateDrawable().setColorFilter(progressColor,
                android.graphics.PorterDuff.Mode.MULTIPLY);
    }
}
