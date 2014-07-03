class Solution {
public:
    void setZeroes(vector<vector<int> > &matrix) {
        int m = matrix.size();
        int n = matrix[0].size();
        bool row_has_zero = false;
        bool col_has_zero = false;
        
        for (int i = 0; i < m; ++i)
            if (0 == matrix[i][0]) {
                col_has_zero = true;
                break;
            }
        
        for (int j = 0; j < n; ++j)
            if (0 == matrix[0][j]) {
                row_has_zero = true;
                break;
            }
            
        for (int i = 1; i < m; ++i)
            for (int j = 1; j < n; ++j)
                if (0 == matrix[i][j]) {
                    matrix[i][0] = 0;
                    matrix[0][j] = 0;
                }
                
        for (int i = 1; i < m; ++i)
            for (int j = 1; j < n; ++j)
                if (0 == matrix[0][j] || 0 == matrix[i][0])
                    matrix[i][j] = 0;
                    
        if (row_has_zero)
            for (int j = 0; j < n; ++j) matrix[0][j] = 0;
            
        if (col_has_zero)
            for (int i = 0; i < m; ++i) matrix[i][0] = 0;
    }
};
