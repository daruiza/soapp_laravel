<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IEvidenceQuery {
    public function index(Request $request);
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function showByEvidenceId(Request $request, int $id);
    public function showByEmployeeReportId(Request $request, int $id);    
}
