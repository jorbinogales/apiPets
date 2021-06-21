<?php 

namespace App\Utils;

final class CodeResponse
{
    const CREATED = 'H0001';
    const TOKEN_EXPIRED = 'H0002';
    const CODE_EXPIRED = 'H0003';
    const SUCCESSFUL = 'H0004';
    const INVALID_CREDENTIALS = 'H0005';
    const UNVERIFIED = 'H0006';
    const BANNED = 'H0007';
    const MAX_DEVICE = 'H0008';
    const INVALID_TOKEN = 'H0009';
    const FORBIDDEN = 'H0010';
    const RESOURCE_EXIST = 'H0011';
    const ID_EQUALS = 'H0012';
    const BAD_REQUEST = 'H0013';
    const DATA_NOT_FOUND = 'H0014';
    const UNPROCESSABLE_DATA = 'H0015';
    const RELATED_MODEL = 'H0016';
    const DUPLICATE_ENTRY = 'H0018';
    const DUE_DATE = 'H0021';
    const IS_CLOSED = 'H0023';
    const MONTH_NOT_COMPLETED = 'H0025';
    const DATE_NOT_ACCEPTABLE = 'H0026';
    const DATE_NOT_EQUALS = 'H0027';
    const ADDED_TO_CREATION_QUEUE = 'H0028';
    const PENDING_ALREADY_EXIST = 'H0029';
}
